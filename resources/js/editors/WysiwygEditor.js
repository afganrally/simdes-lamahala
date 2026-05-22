import DOMPurify from 'dompurify';

/**
 * WYSIWYG Editor - Simple contenteditable editor like Microsoft Word
 */
class WysiwygEditor {
    constructor(textareaId, options = {}) {
        this.textareaId = textareaId;
        this.textarea = document.getElementById(textareaId);
        this.container = null;
        this.toolbar = null;
        this.editorPane = null;
        this.options = {
            height: options.height || '400px',
            maxHeight: options.maxHeight || '600px',
            toolbar: options.toolbar !== false,
            ...options
        };
        this.isDestroyed = false;
        this.syncTimer = null;
        this.savedRange = null;
    }

    /**
     * Initialize the editor
     */
    init() {
        if (!this.textarea) {
            console.error(`Textarea with id "${this.textareaId}" not found`);
            return;
        }

        // Hide original textarea
        this.textarea.classList.add('hidden');

        // Create editor structure
        this.createEditorStructure();

        // Create toolbar
        if (this.options.toolbar) {
            this.createToolbar();
        }

        // Setup event listeners
        this.setupEventListeners();

        // Load initial content
        this.loadContent();

        console.log('WYSIWYG Editor initialized');
    }

    /**
     * Create editor HTML structure
     */
    createEditorStructure() {
        // Create container
        this.container = document.createElement('div');
        this.container.className = 'wysiwyg-editor-container';

        // Create toolbar container
        const toolbarContainer = document.createElement('div');
        toolbarContainer.className = 'wysiwyg-toolbar-container';
        this.container.appendChild(toolbarContainer);

        // Create editor pane (contenteditable div)
        this.editorPane = document.createElement('div');
        this.editorPane.className = 'wysiwyg-editor-content';
        this.editorPane.contentEditable = true;
        this.editorPane.style.minHeight = this.options.height;
        this.editorPane.style.maxHeight = this.options.maxHeight;

        // Create hidden file input for image upload
        this.imageInput = document.createElement('input');
        this.imageInput.type = 'file';
        this.imageInput.accept = 'image/*';
        this.imageInput.style.display = 'none';
        this.imageInput.addEventListener('change', (e) => this.handleImageUpload(e));

        // Insert after textarea
        this.textarea.parentNode.insertBefore(this.container, this.textarea.nextSibling);
        this.container.appendChild(this.imageInput);
        this.container.appendChild(this.editorPane);
    }

    /**
     * Create toolbar with formatting buttons
     */
    createToolbar() {
        this.toolbar = document.createElement('div');
        this.toolbar.className = 'wysiwyg-toolbar';

        // Create button groups
        const groups = [
            // Basic formatting
            [
                { icon: this.getIcon('bold'), title: 'Bold (Ctrl+B)', action: 'bold' },
                { icon: this.getIcon('italic'), title: 'Italic (Ctrl+I)', action: 'italic' },
                { icon: this.getIcon('underline'), title: 'Underline (Ctrl+U)', action: 'underline' },
                { icon: this.getIcon('strikethrough'), title: 'Strikethrough', action: 'strikeThrough' },
            ],
            // Headings
            [
                { icon: this.getIcon('heading'), title: 'Heading 1', action: 'formatBlock', value: 'H1' },
                { icon: this.getIcon('heading2'), title: 'Heading 2', action: 'formatBlock', value: 'H2' },
                { icon: this.getIcon('heading3'), title: 'Heading 3', action: 'formatBlock', value: 'H3' },
            ],
            // Lists
            [
                { icon: this.getIcon('ul'), title: 'Bullet List', action: 'insertUnorderedList' },
                { icon: this.getIcon('ol'), title: 'Numbered List', action: 'insertOrderedList' },
            ],
            // Advanced
            [
                { icon: this.getIcon('link'), title: 'Insert Link', action: 'createLink' },
                { icon: this.getIcon('image'), title: 'Insert Image', action: 'insertImage' },
                { icon: this.getIcon('code'), title: 'Code Block', action: 'formatBlock', value: 'PRE' },
                { icon: this.getIcon('quote'), title: 'Blockquote', action: 'formatBlock', value: 'BLOCKQUOTE' },
            ],
            // Alignment
            [
                { icon: this.getIcon('alignLeft'), title: 'Align Left', action: 'justifyLeft' },
                { icon: this.getIcon('alignCenter'), title: 'Align Center', action: 'justifyCenter' },
                { icon: this.getIcon('alignRight'), title: 'Align Right', action: 'justifyRight' },
                { icon: this.getIcon('alignJustify'), title: 'Align Justify', action: 'justifyFull' },
            ],
            // Utilities
            [
                { icon: this.getIcon('removeFormat'), title: 'Clear Formatting', action: 'removeFormat' },
                { icon: this.getIcon('undo'), title: 'Undo (Ctrl+Z)', action: 'undo' },
                { icon: this.getIcon('redo'), title: 'Redo (Ctrl+Y)', action: 'redo' },
            ],
        ];

        groups.forEach(buttons => {
            const group = document.createElement('div');
            group.className = 'wysiwyg-toolbar-group';

            buttons.forEach(btn => {
                const button = document.createElement('button');
                button.type = 'button';
                button.className = 'wysiwyg-toolbar-btn';
                button.title = btn.title;
                button.innerHTML = btn.icon;
                button.setAttribute('data-action', btn.action);

                if (btn.value) {
                    button.setAttribute('data-value', btn.value);
                }

                button.addEventListener('click', (e) => {
                    e.preventDefault();
                    this.handleToolbarAction(btn.action, btn.value);
                });

                group.appendChild(button);
            });

            this.toolbar.appendChild(group);
            this.toolbar.appendChild(this.createSeparator());
        });

        // Remove last separator
        if (this.toolbar.lastChild) {
            this.toolbar.removeChild(this.toolbar.lastChild);
        }

        // Insert toolbar at the top of toolbar container
        const toolbarContainer = this.container.querySelector('.wysiwyg-toolbar-container');
        toolbarContainer.appendChild(this.toolbar);
    }

    /**
     * Create toolbar separator
     */
    createSeparator() {
        const separator = document.createElement('div');
        separator.className = 'wysiwyg-toolbar-separator';
        return separator;
    }

    /**
     * Get SVG icon for toolbar button
     */
    getIcon(name) {
        const icons = {
            bold: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 4h8a4 4 0 0 1 4 4 4 4 0 0 1-4 4H6z"></path><path d="M6 12h9a4 4 0 0 1 4 4 4 4 0 0 1-4 4H6z"></path></svg>',
            italic: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="19" y1="4" x2="10" y2="4"></line><line x1="14" y1="20" x2="5" y2="20"></line><line x1="15" y1="4" x2="9" y2="20"></line></svg>',
            underline: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 3v7a6 6 0 0 0 6 6 6 6 0 0 0 6-6V3"></path><line x1="4" y1="21" x2="20" y2="21"></line></svg>',
            strikethrough: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 4H9a3 3 0 0 0-3 3v0a3 3 0 0 0 3 3h6"></path><path d="M8 20h7a3 3 0 0 0 3-3v0a3 3 0 0 0-3-3H8"></path><line x1="4" y1="12" x2="20" y2="12"></line></svg>',
            heading: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 4v8"></path><path d="M6 12h8"></path><path d="M14 4v8"></path><text x="18" y="9" font-size="10" font-weight="bold">1</text></svg>',
            heading2: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 4v8"></path><path d="M6 12h8"></path><path d="M14 4v8"></path><text x="18" y="9" font-size="10" font-weight="bold">2</text></svg>',
            heading3: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 4v8"></path><path d="M6 12h8"></path><path d="M14 4v8"></path><text x="18" y="9" font-size="10" font-weight="bold">3</text></svg>',
            ul: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>',
            ol: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="10" y1="6" x2="21" y2="6"></line><line x1="10" y1="12" x2="21" y2="12"></line><line x1="10" y1="18" x2="21" y2="18"></line><path d="M4 6h1v4"></path><path d="M4 10h2"></path><path d="M6 18H4c0-1 2-2 2-3s-1-1.5-2-1"></path></svg>',
            link: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>',
            image: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>',
            code: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>',
            quote: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z"></path><path d="M15 21c3 0 7-1 7-8V5c0-1.25-.757-2.017-2-2h-4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z"></path></svg>',
            alignLeft: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="17" y1="10" x2="3" y2="10"></line><line x1="21" y1="6" x2="3" y2="6"></line><line x1="21" y1="14" x2="3" y2="14"></line><line x1="17" y1="18" x2="3" y2="18"></line></svg>',
            alignCenter: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="21" y1="10" x2="3" y2="10"></line><line x1="21" y1="6" x2="3" y2="6"></line><line x1="21" y1="14" x2="3" y2="14"></line><line x1="21" y1="18" x2="3" y2="18"></line></svg>',
            alignRight: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="21" y1="10" x2="7" y2="10"></line><line x1="21" y1="6" x2="3" y2="6"></line><line x1="21" y1="14" x2="3" y2="14"></line><line x1="21" y1="18" x2="7" y2="18"></line></svg>',
            alignJustify: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="21" y1="10" x2="3" y2="10"></line><line x1="21" y1="6" x2="3" y2="6"></line><line x1="21" y1="14" x2="3" y2="14"></line><line x1="21" y1="18" x2="3" y2="18"></line></svg>',
            removeFormat: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>',
            undo: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 7v6h6"></path><path d="M21 17a9 9 0 0 0-9-9 9 9 0 0 0-6 2.3L3 13"></path></svg>',
            redo: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 7v6h-6"></path><path d="M3 17a9 9 0 0 1 9-9 9 9 0 0 1 6 2.3L21 13"></path></svg>',
        };
        return icons[name] || '';
    }

    /**
     * Setup event listeners
     */
    setupEventListeners() {
        // Sync on input
        this.editorPane.addEventListener('input', () => {
            this.debouncedSync();
            this.saveSelection();
        });

        // Keyboard shortcuts
        this.editorPane.addEventListener('keydown', (e) => {
            this.handleKeyboardShortcuts(e);
        });

        // Handle paste - sanitize pasted content
        this.editorPane.addEventListener('paste', (e) => {
            e.preventDefault();
            const text = (e.clipboardData || window.clipboardData).getData('text');
            const cleanText = DOMPurify.sanitize(text, {
                ALLOWED_TAGS: ['b', 'i', 'u', 's', 'strong', 'em', 'p', 'br', 'ul', 'ol', 'li', 'a', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'pre', 'code', 'blockquote'],
                ALLOWED_ATTR: ['href', 'title']
            });
            document.execCommand('insertHTML', false, cleanText);
            this.saveSelection();
        });

        // Track kursor / pilihan teks agar kursor tidak hilang saat membuka modal
        this.editorPane.addEventListener('keyup', () => this.saveSelection());
        this.editorPane.addEventListener('click', () => this.saveSelection());
        this.editorPane.addEventListener('focus', () => this.saveSelection());
        this.editorPane.addEventListener('blur', () => this.saveSelection());
    }

    /**
     * Menyimpan pilihan (range) kursor saat ini
     */
    saveSelection() {
        const sel = window.getSelection();
        if (sel.getRangeAt && sel.rangeCount) {
            const range = sel.getRangeAt(0);
            // Pastikan selection berada di dalam panel editor
            if (this.editorPane.contains(range.commonAncestorContainer)) {
                this.savedRange = range;
            }
        }
    }

    /**
     * Mengembalikan pilihan (range) kursor ke posisi tersimpan
     */
    restoreSelection() {
        const sel = window.getSelection();
        if (this.savedRange) {
            sel.removeAllRanges();
            sel.addRange(this.savedRange);
        } else {
            // Jika tidak ada range tersimpan, posisikan di akhir konten editor
            this.editorPane.focus();
            const range = document.createRange();
            range.selectNodeContents(this.editorPane);
            range.collapse(false);
            sel.removeAllRanges();
            sel.addRange(range);
        }
    }

    /**
     * Handle toolbar button actions
     */
    handleToolbarAction(action, value = null) {
        this.restoreSelection();
        this.editorPane.focus();

        switch (action) {
            case 'createLink':
                const url = prompt('Masukkan URL:', 'https://');
                if (url) {
                    this.restoreSelection();
                    document.execCommand('createLink', false, url);
                    this.saveSelection();
                }
                break;
            case 'insertImage':
                this.saveSelection();
                // Trigger file input click
                this.imageInput.click();
                return; // Don't sync yet, wait for upload
            case 'formatBlock':
                document.execCommand(action, false, `<${value}>`);
                this.saveSelection();
                break;
            default:
                document.execCommand(action, false, value);
                this.saveSelection();
        }

        this.syncToLivewire();
    }

    /**
     * Handle keyboard shortcuts
     */
    handleKeyboardShortcuts(e) {
        if (e.ctrlKey || e.metaKey) {
            switch (e.key.toLowerCase()) {
                case 'b':
                    e.preventDefault();
                    this.handleToolbarAction('bold');
                    break;
                case 'i':
                    e.preventDefault();
                    this.handleToolbarAction('italic');
                    break;
                case 'u':
                    e.preventDefault();
                    this.handleToolbarAction('underline');
                    break;
            }
        }
    }

    /**
     * Handle image upload
     */
    async handleImageUpload(event) {
        const file = event.target.files[0];
        if (!file) return;

        // Validate file type
        if (!file.type.startsWith('image/')) {
            alert('Harap pilih file gambar!');
            return;
        }

        // Validate file size (max 2MB)
        if (file.size > 2 * 1024 * 1024) {
            alert('Ukuran gambar maksimal 2MB!');
            return;
        }

        // Show loading indicator
        const uploadBtn = this.toolbar.querySelector('[data-action="insertImage"]');
        const originalIcon = uploadBtn.innerHTML;
        uploadBtn.innerHTML = '<span class="text-xs">⏳</span>';
        uploadBtn.disabled = true;

        try {
            // Create FormData
            const formData = new FormData();
            formData.append('image', file);
            formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

            // Upload to server
            const response = await fetch('/wysiwyg/upload-image', {
                method: 'POST',
                body: formData,
            });

            if (!response.ok) {
                throw new Error('Upload gagal');
            }

            const result = await response.json();

            if (result.success && result.url) {
                // Show image dialog for preview and settings
                this.showImageDialog(result.url);
            } else {
                throw new Error(result.message || 'Upload gagal');
            }

        } catch (error) {
            console.error('Error uploading image:', error);
            alert('Gagal mengupload gambar: ' + error.message);
        } finally {
            // Reset file input
            this.imageInput.value = '';

            // Restore button
            const uploadBtn = this.toolbar.querySelector('[data-action="insertImage"]');
            uploadBtn.innerHTML = originalIcon;
            uploadBtn.disabled = false;
        }
    }

    /**
     * Show image dialog for preview and settings
     */
    showImageDialog(imageUrl) {
        // Create modal overlay
        const overlay = document.createElement('div');
        overlay.className = 'wysiwyg-image-dialog-overlay';
        overlay.style.cssText = `
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10000;
        `;

        // Create dialog
        const dialog = document.createElement('div');
        dialog.className = 'wysiwyg-image-dialog';
        dialog.style.cssText = `
            background: white;
            border-radius: 0.5rem;
            padding: 1.5rem;
            max-width: 700px;
            width: 90%;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        `;

        // Check dark mode
        const isDarkMode = document.documentElement.classList.contains('dark');
        if (isDarkMode) {
            dialog.style.background = '#1f2937';
            dialog.style.color = '#e5e7eb';
        }

        dialog.innerHTML = `
            <h3 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 0.5rem;">Atur Gambar</h3>
            <p style="font-size: 0.875rem; color: #6b7280; margin-bottom: 1rem;">Tarik sudut gambar untuk mengatur ukuran</p>

            <!-- Canvas Area -->
            <div style="position: relative; background: #f3f4f6; border-radius: 0.5rem; padding: 2rem; min-height: 300px; display: flex; align-items: center; justify-content: center; margin-bottom: 1rem; overflow: hidden;">
                <div id="wysiwyg-image-resize-container" style="position: relative; display: inline-block; cursor: move;">
                    <img id="wysiwyg-image-preview" src="${imageUrl}" alt="Preview" style="display: block; max-width: 100%; pointer-events: none;">
                    <!-- Resize Handles -->
                    <div class="resize-handle" data-handle="nw" style="position: absolute; top: -5px; left: -5px; width: 12px; height: 12px; background: #059669; border: 2px solid white; border-radius: 50%; cursor: nw-resize; z-index: 10;"></div>
                    <div class="resize-handle" data-handle="ne" style="position: absolute; top: -5px; right: -5px; width: 12px; height: 12px; background: #059669; border: 2px solid white; border-radius: 50%; cursor: ne-resize; z-index: 10;"></div>
                    <div class="resize-handle" data-handle="sw" style="position: absolute; bottom: -5px; left: -5px; width: 12px; height: 12px; background: #059669; border: 2px solid white; border-radius: 50%; cursor: sw-resize; z-index: 10;"></div>
                    <div class="resize-handle" data-handle="se" style="position: absolute; bottom: -5px; right: -5px; width: 12px; height: 12px; background: #059669; border: 2px solid white; border-radius: 50%; cursor: se-resize; z-index: 10;"></div>
                    <!-- Border when resizing -->
                    <div id="wysiwyg-image-border" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; border: 2px dashed #059669; pointer-events: none; display: none;"></div>
                </div>
            </div>

            <!-- Size Info -->
            <div style="text-align: center; margin-bottom: 1rem;">
                <span id="wysiwyg-image-size" style="font-size: 0.875rem; font-weight: 500; color: #059669;">Ukuran asli akan digunakan</span>
            </div>

            <!-- Alt Text -->
            <div style="margin-bottom: 1rem;">
                <label style="display: block; font-size: 0.875rem; font-weight: 500; margin-bottom: 0.5rem;">Alt Text (Deskripsi Gambar)</label>
                <input type="text" id="wysiwyg-image-alt" placeholder="Deskripsi gambar untuk aksesibilitas" style="width: 100%; padding: 0.5rem; border: 1px solid #d1d5db; border-radius: 0.375rem;">
            </div>

            <!-- Alignment -->
            <div style="margin-bottom: 1rem;">
                <label style="display: block; font-size: 0.875rem; font-weight: 500; margin-bottom: 0.5rem;">Posisi</label>
                <select id="wysiwyg-image-align" style="width: 100%; padding: 0.5rem; border: 1px solid #d1d5db; border-radius: 0.375rem;">
                    <option value="none">Normal (Inline)</option>
                    <option value="left">Kiri</option>
                    <option value="center" selected>Tengah</option>
                    <option value="right">Kanan</option>
                </select>
            </div>

            <!-- Buttons -->
            <div style="display: flex; gap: 0.5rem; margin-top: 1.5rem;">
                <button id="wysiwyg-image-cancel" style="flex: 1; padding: 0.5rem 1rem; background: #9ca3af; color: white; border: none; border-radius: 0.375rem; cursor: pointer; font-weight: 500;">Batal</button>
                <button id="wysiwyg-image-insert" style="flex: 1; padding: 0.5rem 1rem; background: #059669; color: white; border: none; border-radius: 0.375rem; cursor: pointer; font-weight: 500;">Insert</button>
            </div>
        `;

        overlay.appendChild(dialog);
        document.body.appendChild(overlay);

        // Get elements
        const imgPreview = document.getElementById('wysiwyg-image-preview');
        const resizeContainer = document.getElementById('wysiwyg-image-resize-container');
        const imageBorder = document.getElementById('wysiwyg-image-border');
        const sizeDisplay = document.getElementById('wysiwyg-image-size');

        // Declare variables in outer scope for access in insert handler
        let currentWidth = 0;
        let currentHeight = 0;

        // Wait for image to load
        imgPreview.onload = () => {
            // Store original dimensions
            let originalWidth = imgPreview.naturalWidth;
            let originalHeight = imgPreview.naturalHeight;

            // Limit initial display size to fit dialog
            let displayWidth = originalWidth;
            let displayHeight = originalHeight;
            const maxWidth = 500; // Max width for dialog

            if (displayWidth > maxWidth) {
                displayWidth = maxWidth;
                displayHeight = (maxWidth / originalWidth) * originalHeight;
            }

            // Set initial size
            imgPreview.style.width = displayWidth + 'px';
            imgPreview.style.height = displayHeight + 'px';

            // Update outer scope variables
            currentWidth = displayWidth;
            currentHeight = displayHeight;
            let aspectRatio = originalWidth / originalHeight;

            // Update size display
            sizeDisplay.textContent = `${Math.round(currentWidth)} × ${Math.round(currentHeight)} px`;

            // Setup resize functionality
            let isResizing = false;
            let currentHandle = null;
            let startX, startY, startWidth, startHeight;

            resizeContainer.addEventListener('mousedown', (e) => {
                if (e.target.classList.contains('resize-handle')) {
                    isResizing = true;
                    currentHandle = e.target.dataset.handle;
                    startX = e.clientX;
                    startY = e.clientY;
                    startWidth = currentWidth;
                    startHeight = currentHeight;

                    imageBorder.style.display = 'block';
                    e.preventDefault();
                }
            });

            document.addEventListener('mousemove', (e) => {
                if (!isResizing) return;

                const deltaX = e.clientX - startX;
                const deltaY = e.clientY - startY;

                let newWidth = startWidth;
                let newHeight = startHeight;

                switch (currentHandle) {
                    case 'se': // South East
                        newWidth = startWidth + deltaX;
                        newHeight = newWidth / aspectRatio;
                        break;
                    case 'sw': // South West
                        newWidth = startWidth - deltaX;
                        newHeight = newWidth / aspectRatio;
                        break;
                    case 'ne': // North East
                        newWidth = startWidth + deltaX;
                        newHeight = newWidth / aspectRatio;
                        break;
                    case 'nw': // North West
                        newWidth = startWidth - deltaX;
                        newHeight = newWidth / aspectRatio;
                        break;
                }

                // Minimum size
                if (newWidth < 50) newWidth = 50;
                if (newHeight < 50) newHeight = 50;

                // Apply new size
                imgPreview.style.width = newWidth + 'px';
                imgPreview.style.height = newHeight + 'px';

                currentWidth = newWidth;
                currentHeight = newHeight;

                // Update size display
                sizeDisplay.textContent = `${Math.round(newWidth)} × ${Math.round(newHeight)} px`;
            });

            document.addEventListener('mouseup', () => {
                if (isResizing) {
                    isResizing = false;
                    currentHandle = null;
                    imageBorder.style.display = 'none';
                }
            });
        };

        // Handle image load error
        imgPreview.onerror = () => {
            sizeDisplay.textContent = 'Gagal memuat gambar';
            sizeDisplay.style.color = '#dc2626';
        };

        // Focus editor back after modal closes
        this.editorPane.focus();

        // Handle cancel
        document.getElementById('wysiwyg-image-cancel').addEventListener('click', () => {
            document.body.removeChild(overlay);
            this.editorPane.focus();
        });

        // Handle insert
        document.getElementById('wysiwyg-image-insert').addEventListener('click', () => {
            const alt = document.getElementById('wysiwyg-image-alt').value;
            const align = document.getElementById('wysiwyg-image-align').value;
            const finalWidth = Math.round(currentWidth);
            const finalHeight = Math.round(currentHeight);

            // Build image HTML with styles
            let imgHtml = `<img src="${imageUrl}" alt="${alt || 'Gambar'}" width="${finalWidth}" height="${finalHeight}"`;

            // Add alignment
            if (align === 'left') {
                imgHtml += ` style="float: left; margin: 0 1rem 1rem 0;"`;
            } else if (align === 'right') {
                imgHtml += ` style="float: right; margin: 0 0 1rem 1rem;"`;
            } else if (align === 'center') {
                imgHtml += ` style="display: block; margin: 1rem auto;"`;
            } else {
                imgHtml += ` style="max-width: 100%; height: auto; border-radius: 0.5rem;"`;
            }

            imgHtml += '>';

            // Restore selection and insert image into editor
            this.restoreSelection();
            document.execCommand('insertHTML', false, imgHtml);
            this.saveSelection();
            this.syncToLivewire();

            // Close modal
            document.body.removeChild(overlay);
            this.editorPane.focus();
        });

        // Close on overlay click
        overlay.addEventListener('click', (e) => {
            if (e.target === overlay) {
                document.body.removeChild(overlay);
                this.editorPane.focus();
            }
        });

        // Close on escape key
        const handleEscape = (e) => {
            if (e.key === 'Escape') {
                document.body.removeChild(overlay);
                this.editorPane.focus();
                document.removeEventListener('keydown', handleEscape);
            }
        };
        document.addEventListener('keydown', handleEscape);
    }

    /**
     * Load content from textarea
     */
    loadContent() {
        const content = this.textarea.value || '';
        this.editorPane.innerHTML = content;
    }

    /**
     * Get content from editor
     */
    getContent() {
        return this.editorPane.innerHTML;
    }

    /**
     * Set content programmatically
     */
    setContent(content) {
        this.editorPane.innerHTML = content || '';
        this.syncToLivewire();
    }

    /**
     * Sync editor content to Livewire wire:model
     */
    syncToLivewire() {
        if (this.isDestroyed) return;

        // Update hidden textarea
        this.textarea.value = this.editorPane.innerHTML;

        // Dispatch input event for wire:model
        this.textarea.dispatchEvent(new Event('input', {
            bubbles: true,
            cancelable: true
        }));
    }

    /**
     * Debounced sync to Livewire
     */
    debouncedSync() {
        if (this.syncTimer) {
            clearTimeout(this.syncTimer);
        }
        this.syncTimer = setTimeout(() => {
            this.syncToLivewire();
        }, 300);
    }

    /**
     * Destroy editor instance
     */
    destroy() {
        this.isDestroyed = true;

        // Clear timer
        if (this.syncTimer) {
            clearTimeout(this.syncTimer);
        }

        // Show original textarea
        this.textarea.classList.remove('hidden');

        // Remove editor container
        if (this.container && this.container.parentNode) {
            this.container.parentNode.removeChild(this.container);
        }

        console.log('WYSIWYG Editor destroyed');
    }
}

// Export for use in other modules
export default WysiwygEditor;
