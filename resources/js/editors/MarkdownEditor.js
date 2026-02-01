import { marked } from 'marked';
import DOMPurify from 'dompurify';

// Configure marked
marked.setOptions({
    breaks: true,
    gfm: true,
});

/**
 * MarkdownEditor - Hybrid markdown editor with live preview
 */
class MarkdownEditor {
    constructor(textareaId, options = {}) {
        this.textareaId = textareaId;
        this.textarea = document.getElementById(textareaId);
        this.container = null;
        this.editorPane = null;
        this.previewPane = null;
        this.toolbar = null;
        this.options = {
            height: options.height || '400px',
            maxHeight: options.maxHeight || '600px',
            toolbar: options.toolbar !== false,
            livePreview: options.livePreview !== false,
            ...options
        };
        this.debounceTimer = null;
        this.syncTimer = null;
        this.isDestroyed = false;
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

        // Initial render
        this.renderPreview();

        console.log('MarkdownEditor initialized');
    }

    /**
     * Create editor HTML structure
     */
    createEditorStructure() {
        // Create container
        this.container = document.createElement('div');
        this.container.className = 'markdown-editor-container';
        this.container.style.maxHeight = this.options.maxHeight;

        // Insert after textarea
        this.textarea.parentNode.insertBefore(this.container, this.textarea.nextSibling);

        // Create panels wrapper
        const panels = document.createElement('div');
        panels.className = 'markdown-editor-panels';

        // Create editor panel
        this.editorPane = document.createElement('textarea');
        this.editorPane.className = 'markdown-textarea';
        this.editorPane.placeholder = 'Tulis konten artikel di sini menggunakan Markdown...\n\n# Contoh Heading\n\nIni adalah **teks bold** dan *teks italic*.\n\n- List item 1\n- List item 2\n\n[Cek preview di panel kanan →]';
        this.editorPane.value = this.textarea.value || '';

        // Create preview panel
        this.previewPane = document.createElement('div');
        this.previewPane.className = 'markdown-preview-panel';

        const previewContent = document.createElement('div');
        previewContent.className = 'markdown-preview-content';
        this.previewPane.appendChild(previewContent);

        // Assemble panels
        const editorPanel = document.createElement('div');
        editorPanel.className = 'markdown-editor-panel';
        editorPanel.appendChild(this.editorPane);

        panels.appendChild(editorPanel);
        panels.appendChild(this.previewPane);

        this.container.appendChild(panels);
    }

    /**
     * Create toolbar with formatting buttons
     */
    createToolbar() {
        this.toolbar = document.createElement('div');
        this.toolbar.className = 'markdown-toolbar';

        // Basic formatting group
        const basicGroup = this.createToolbarGroup([
            { icon: this.getIcon('bold'), title: 'Bold (Ctrl+B)', action: 'bold' },
            { icon: this.getIcon('italic'), title: 'Italic (Ctrl+I)', action: 'italic' },
            { icon: this.getIcon('underline'), title: 'Underline (Ctrl+U)', action: 'underline' },
            { icon: this.getIcon('strikethrough'), title: 'Strikethrough', action: 'strikethrough' },
        ]);

        // Headings group
        const headingsGroup = this.createToolbarGroup([
            { icon: this.getIcon('heading'), title: 'Heading', action: 'heading', dropdown: true },
        ]);

        // Lists group
        const listsGroup = this.createToolbarGroup([
            { icon: this.getIcon('ul'), title: 'Bullet List', action: 'ul' },
            { icon: this.getIcon('ol'), title: 'Numbered List', action: 'ol' },
        ]);

        // Advanced group
        const advancedGroup = this.createToolbarGroup([
            { icon: this.getIcon('link'), title: 'Link (Ctrl+K)', action: 'link' },
            { icon: this.getIcon('image'), title: 'Image', action: 'image' },
            { icon: this.getIcon('code'), title: 'Code Block', action: 'code' },
            { icon: this.getIcon('quote'), title: 'Blockquote', action: 'blockquote' },
        ]);

        // Table group
        const tableGroup = this.createToolbarGroup([
            { icon: this.getIcon('table'), title: 'Insert Table', action: 'table' },
        ]);

        // Alignment group
        const alignGroup = this.createToolbarGroup([
            { icon: this.getIcon('alignLeft'), title: 'Align Left', action: 'alignLeft' },
            { icon: this.getIcon('alignCenter'), title: 'Align Center', action: 'alignCenter' },
            { icon: this.getIcon('alignRight'), title: 'Align Right', action: 'alignRight' },
            { icon: this.getIcon('alignJustify'), title: 'Align Justify', action: 'alignJustify' },
        ]);

        // Add groups to toolbar
        this.toolbar.appendChild(basicGroup);
        this.toolbar.appendChild(headingsGroup);
        this.toolbar.appendChild(listsGroup);
        this.toolbar.appendChild(this.createSeparator());
        this.toolbar.appendChild(advancedGroup);
        this.toolbar.appendChild(tableGroup);
        this.toolbar.appendChild(this.createSeparator());
        this.toolbar.appendChild(alignGroup);

        // Insert toolbar at the top of container
        this.container.insertBefore(this.toolbar, this.container.firstChild);
    }

    /**
     * Create toolbar group
     */
    createToolbarGroup(buttons) {
        const group = document.createElement('div');
        group.className = 'markdown-toolbar-group';

        buttons.forEach(btn => {
            const button = document.createElement('button');
            button.type = 'button';
            button.className = 'markdown-toolbar-btn';
            button.title = btn.title;
            button.innerHTML = btn.icon;
            button.setAttribute('data-action', btn.action);

            if (btn.dropdown) {
                button.classList.add('dropdown');
            }

            button.addEventListener('click', (e) => {
                e.preventDefault();
                this.handleToolbarAction(btn.action);
            });

            group.appendChild(button);
        });

        return group;
    }

    /**
     * Create toolbar separator
     */
    createSeparator() {
        const separator = document.createElement('div');
        separator.className = 'markdown-toolbar-separator';
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
            heading: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 4v8"></path><path d="M6 12h8"></path><path d="M14 4v8"></path><path d="M18 12h2"></path><path d="M18 8h2"></path><path d="M18 4h2"></path><path d="M18 16h2"></path><path d="M18 20h2"></path></svg>',
            ul: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>',
            ol: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="10" y1="6" x2="21" y2="6"></line><line x1="10" y1="12" x2="21" y2="12"></line><line x1="10" y1="18" x2="21" y2="18"></line><path d="M4 6h1v4"></path><path d="M4 10h2"></path><path d="M6 18H4c0-1 2-2 2-3s-1-1.5-2-1"></path></svg>',
            link: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>',
            image: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>',
            code: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>',
            quote: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z"></path><path d="M15 21c3 0 7-1 7-8V5c0-1.25-.757-2.017-2-2h-4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z"></path></svg>',
            table: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 3H5a2 2 0 0 0-2 2v4m6-6h10a2 2 0 0 1 2 2v4M9 3v18m0 0h10a2 2 0 0 0 2-2v-4M9 21H5a2 2 0 0 1-2-2v-4m8 0V9"></path></svg>',
            alignLeft: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="17" y1="10" x2="3" y2="10"></line><line x1="21" y1="6" x2="3" y2="6"></line><line x1="21" y1="14" x2="3" y2="14"></line><line x1="17" y1="18" x2="3" y2="18"></line></svg>',
            alignCenter: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="21" y1="10" x2="3" y2="10"></line><line x1="21" y1="6" x2="3" y2="6"></line><line x1="21" y1="14" x2="3" y2="14"></line><line x1="21" y1="18" x2="3" y2="18"></line></svg>',
            alignRight: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="21" y1="10" x2="7" y2="10"></line><line x1="21" y1="6" x2="3" y2="6"></line><line x1="21" y1="14" x2="3" y2="14"></line><line x1="21" y1="18" x2="7" y2="18"></line></svg>',
            alignJustify: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="21" y1="10" x2="3" y2="10"></line><line x1="21" y1="6" x2="3" y2="6"></line><line x1="21" y1="14" x2="3" y2="14"></line><line x1="21" y1="18" x2="3" y2="18"></line></svg>',
        };
        return icons[name] || '';
    }

    /**
     * Setup event listeners
     */
    setupEventListeners() {
        // Input event for live preview
        this.editorPane.addEventListener('input', () => {
            this.debouncedRender();
            this.debouncedSync();
        });

        // Scroll sync
        this.editorPane.addEventListener('scroll', () => {
            this.syncScroll();
        });

        // Keyboard shortcuts
        this.editorPane.addEventListener('keydown', (e) => {
            this.handleKeyboardShortcuts(e);
        });
    }

    /**
     * Handle toolbar button actions
     */
    handleToolbarAction(action) {
        switch (action) {
            case 'bold':
                this.insertBold();
                break;
            case 'italic':
                this.insertItalic();
                break;
            case 'underline':
                this.insertUnderline();
                break;
            case 'strikethrough':
                this.insertStrikethrough();
                break;
            case 'heading':
                this.insertHeading();
                break;
            case 'ul':
                this.insertList(false);
                break;
            case 'ol':
                this.insertList(true);
                break;
            case 'link':
                this.insertLink();
                break;
            case 'image':
                this.insertImage();
                break;
            case 'code':
                this.insertCodeBlock();
                break;
            case 'blockquote':
                this.insertBlockquote();
                break;
            case 'table':
                this.insertTable();
                break;
            case 'alignLeft':
                this.alignText('left');
                break;
            case 'alignCenter':
                this.alignText('center');
                break;
            case 'alignRight':
                this.alignText('right');
                break;
            case 'alignJustify':
                this.alignText('justify');
                break;
        }

        this.editorPane.focus();
    }

    /**
     * Handle keyboard shortcuts
     */
    handleKeyboardShortcuts(e) {
        if (e.ctrlKey || e.metaKey) {
            switch (e.key.toLowerCase()) {
                case 'b':
                    e.preventDefault();
                    this.insertBold();
                    break;
                case 'i':
                    e.preventDefault();
                    this.insertItalic();
                    break;
                case 'u':
                    e.preventDefault();
                    this.insertUnderline();
                    break;
                case 'k':
                    e.preventDefault();
                    this.insertLink();
                    break;
            }
        }

        // Tab key for list indentation
        if (e.key === 'Tab') {
            e.preventDefault();
            if (e.shiftKey) {
                this.outdentList();
            } else {
                this.indentList();
            }
        }
    }

    /**
     * Insert bold markdown
     */
    insertBold() {
        const selection = this.getSelection();
        if (selection.length > 0) {
            this.wrapSelection('**', '**');
        } else {
            this.insertAtCursor('****');
            this.moveCursor(-2);
        }
    }

    /**
     * Insert italic markdown
     */
    insertItalic() {
        const selection = this.getSelection();
        if (selection.length > 0) {
            this.wrapSelection('*', '*');
        } else {
            this.insertAtCursor('**');
            this.moveCursor(-1);
        }
    }

    /**
     * Insert underline HTML
     */
    insertUnderline() {
        const selection = this.getSelection();
        if (selection.length > 0) {
            this.wrapSelection('<u>', '</u>');
        } else {
            this.insertAtCursor('<u></u>');
            this.moveCursor(-4);
        }
    }

    /**
     * Insert strikethrough markdown
     */
    insertStrikethrough() {
        const selection = this.getSelection();
        if (selection.length > 0) {
            this.wrapSelection('~~', '~~');
        } else {
            this.insertAtCursor('~~~~');
            this.moveCursor(-2);
        }
    }

    /**
     * Insert heading (prompt for level)
     */
    insertHeading() {
        const level = prompt('Masukkan level heading (1-6):', '2');
        if (level && level >= 1 && level <= 6) {
            const prefix = '#'.repeat(parseInt(level)) + ' ';
            const line = this.getCurrentLine();

            // Remove existing heading markers
            const cleanedLine = line.replace(/^#+\s*/, '');
            this.replaceCurrentLine(prefix + cleanedLine);
            this.renderPreview();
        }
    }

    /**
     * Insert list (ordered or unordered)
     */
    insertList(ordered) {
        const prefix = ordered ? '1. ' : '- ';
        const line = this.getCurrentLine();

        // Check if already a list item
        if (/^[\s]*([-*+]|\d+\.)\s/.test(line)) {
            // Remove existing list marker
            const newLine = line.replace(/^[\s]*(?:[-*+]|\d+\.)\s*/, '');
            this.replaceCurrentLine(newLine);
        } else {
            // Add list marker
            this.replaceCurrentLine(prefix + line);
        }

        this.renderPreview();
    }

    /**
     * Insert link
     */
    insertLink() {
        const selection = this.getSelection() || 'link text';
        const url = prompt('Masukkan URL:', 'https://');

        if (url) {
            this.replaceSelection(`[${selection}](${url})`);
            this.renderPreview();
        }
    }

    /**
     * Insert image
     */
    insertImage() {
        const url = prompt('Masukkan URL gambar:', 'https://');
        const alt = prompt('Masukkan teks alternatif (alt text):', 'Gambar');

        if (url) {
            this.replaceSelection(`![${alt || ''}](${url})`);
            this.renderPreview();
        }
    }

    /**
     * Insert code block
     */
    insertCodeBlock() {
        const selection = this.getSelection() || 'code here';
        const code = `\`\`\`javascript\n${selection}\n\`\`\``;
        this.replaceSelection(code);
        this.renderPreview();
    }

    /**
     * Insert blockquote
     */
    insertBlockquote() {
        const line = this.getCurrentLine();

        if (line.startsWith('> ')) {
            // Remove blockquote
            this.replaceCurrentLine(line.substring(2));
        } else {
            // Add blockquote
            this.replaceCurrentLine('> ' + line);
        }

        this.renderPreview();
    }

    /**
     * Insert table
     */
    insertTable() {
        const table = `
| Header 1 | Header 2 | Header 3 |
|----------|----------|----------|
| Cell 1   | Cell 2   | Cell 3   |
| Cell 4   | Cell 5   | Cell 6   |
`;
        this.insertAtCursor(table.trim());
        this.renderPreview();
    }

    /**
     * Align text (using HTML div)
     */
    alignText(alignment) {
        const line = this.getCurrentLine();

        // Remove existing alignment
        const cleanedLine = line.replace(/<div\s+align="[^"]*">(.*)<\/div>/i, '$1');

        // Add new alignment
        const alignedLine = `<div align="${alignment}">${cleanedLine}</div>`;
        this.replaceCurrentLine(alignedLine);
        this.renderPreview();
    }

    /**
     * Indent list item
     */
    indentList() {
        const line = this.getCurrentLine();
        if (/^[\s]*(?:[-*+]|\d+\.)\s/.test(line)) {
            this.replaceCurrentLine('    ' + line);
            this.renderPreview();
        }
    }

    /**
     * Outdent list item
     */
    outdentList() {
        const line = this.getCurrentLine();
        if (/^[\s]{4}(?:[-*+]|\d+\.)\s/.test(line)) {
            this.replaceCurrentLine(line.substring(4));
            this.renderPreview();
        }
    }

    /**
     * Get selected text
     */
    getSelection() {
        const start = this.editorPane.selectionStart;
        const end = this.editorPane.selectionEnd;
        return this.editorPane.value.substring(start, end);
    }

    /**
     * Get current line
     */
    getCurrentLine() {
        const cursorPos = this.editorPane.selectionStart;
        const text = this.editorPane.value;
        const lineStart = text.lastIndexOf('\n', cursorPos - 1) + 1;
        const lineEnd = text.indexOf('\n', cursorPos);
        return text.substring(lineStart, lineEnd === -1 ? text.length : lineEnd);
    }

    /**
     * Replace current line
     */
    replaceCurrentLine(newLine) {
        const cursorPos = this.editorPane.selectionStart;
        const text = this.editorPane.value;
        const lineStart = text.lastIndexOf('\n', cursorPos - 1) + 1;
        const lineEnd = text.indexOf('\n', cursorPos);

        const newText = text.substring(0, lineStart) + newLine +
            (lineEnd === -1 ? '' : text.substring(lineEnd));

        this.editorPane.value = newText;
        this.syncToLivewire();
    }

    /**
     * Wrap selection with before/after text
     */
    wrapSelection(before, after) {
        const start = this.editorPane.selectionStart;
        const end = this.editorPane.selectionEnd;
        const text = this.editorPane.value;
        const selection = text.substring(start, end);

        const newText = text.substring(0, start) +
            before + selection + after +
            text.substring(end);

        this.editorPane.value = newText;

        // Restore cursor position
        const newCursorPos = end + before.length + after.length;
        this.editorPane.setSelectionRange(newCursorPos, newCursorPos);

        this.renderPreview();
        this.syncToLivewire();
    }

    /**
     * Replace selection with new text
     */
    replaceSelection(newText) {
        const start = this.editorPane.selectionStart;
        const end = this.editorPane.selectionEnd;
        const text = this.editorPane.value;

        this.editorPane.value = text.substring(0, start) + newText + text.substring(end);

        // Set cursor after inserted text
        const newCursorPos = start + newText.length;
        this.editorPane.setSelectionRange(newCursorPos, newCursorPos);

        this.syncToLivewire();
    }

    /**
     * Insert text at cursor position
     */
    insertAtCursor(text) {
        const start = this.editorPane.selectionStart;
        const end = this.editorPane.selectionEnd;
        const value = this.editorPane.value;

        this.editorPane.value = value.substring(0, start) + text + value.substring(end);

        // Move cursor
        const newPos = start + text.length;
        this.editorPane.setSelectionRange(newPos, newPos);

        this.syncToLivewire();
    }

    /**
     * Move cursor relative to current position
     */
    moveCursor(offset) {
        const currentPos = this.editorPane.selectionStart;
        const newPos = Math.max(0, Math.min(this.editorPane.value.length, currentPos + offset));
        this.editorPane.setSelectionRange(newPos, newPos);
    }

    /**
     * Render markdown to HTML in preview pane
     */
    renderPreview() {
        if (!this.options.livePreview || this.isDestroyed) return;

        const markdown = this.editorPane.value;

        if (!markdown.trim()) {
            this.previewPane.querySelector('.markdown-preview-content').innerHTML = '';
            return;
        }

        try {
            // Parse markdown to HTML
            const html = marked.parse(markdown);

            // Sanitize HTML to prevent XSS
            const cleanHtml = DOMPurify.sanitize(html, {
                ALLOWED_TAGS: ['p', 'br', 'strong', 'em', 'u', 's', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6',
                    'ul', 'ol', 'li', 'a', 'img', 'blockquote', 'code', 'pre', 'table', 'thead',
                    'tbody', 'tr', 'th', 'td', 'hr', 'div', 'span'],
                ALLOWED_ATTR: ['href', 'src', 'alt', 'title', 'align', 'class'],
                ALLOW_DATA_ATTR: false
            });

            this.previewPane.querySelector('.markdown-preview-content').innerHTML = cleanHtml;
        } catch (error) {
            console.error('Error rendering markdown:', error);
            this.previewPane.querySelector('.markdown-preview-content').innerHTML = '<p style="color: red;">Error rendering markdown</p>';
        }
    }

    /**
     * Debounced render
     */
    debouncedRender() {
        if (this.debounceTimer) {
            clearTimeout(this.debounceTimer);
        }
        this.debounceTimer = setTimeout(() => {
            this.renderPreview();
        }, 300);
    }

    /**
     * Sync editor content to Livewire wire:model
     */
    syncToLivewire() {
        if (this.isDestroyed) return;

        // Update hidden textarea
        this.textarea.value = this.editorPane.value;

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
     * Sync scroll between editor and preview
     */
    syncScroll() {
        const percentage = this.editorPane.scrollTop /
            (this.editorPane.scrollHeight - this.editorPane.clientHeight);
        this.previewPane.scrollTop = percentage *
            (this.previewPane.scrollHeight - this.previewPane.clientHeight);
    }

    /**
     * Set content programmatically
     */
    setContent(content) {
        this.editorPane.value = content || '';
        this.renderPreview();
        this.syncToLivewire();
    }

    /**
     * Get content
     */
    getContent() {
        return this.editorPane.value;
    }

    /**
     * Destroy editor instance
     */
    destroy() {
        this.isDestroyed = true;

        // Clear timers
        if (this.debounceTimer) {
            clearTimeout(this.debounceTimer);
        }
        if (this.syncTimer) {
            clearTimeout(this.syncTimer);
        }

        // Show original textarea
        this.textarea.classList.remove('hidden');

        // Remove editor container
        if (this.container && this.container.parentNode) {
            this.container.parentNode.removeChild(this.container);
        }

        console.log('MarkdownEditor destroyed');
    }
}

// Export for use in other modules
export default MarkdownEditor;
