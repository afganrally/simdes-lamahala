import MarkdownEditor from './MarkdownEditor.js';
import '../../css/markdown-editor.css';

/**
 * Global instance of MarkdownEditor
 */
let markdownEditorInstance = null;

/**
 * Initialize Markdown Editor
 */
function initializeMarkdownEditor() {
    // Destroy existing instance if any
    if (markdownEditorInstance) {
        markdownEditorInstance.destroy();
        markdownEditorInstance = null;
    }

    // Check if textarea exists
    const textarea = document.getElementById('markdown-editor');
    if (!textarea) {
        console.log('Markdown editor textarea not found');
        return;
    }

    // Create new editor instance
    markdownEditorInstance = new MarkdownEditor('markdown-editor', {
        height: '400px',
        maxHeight: '600px',
        toolbar: true,
        livePreview: true,
    });

    // Initialize the editor
    markdownEditorInstance.init();

    console.log('Markdown Editor initialized successfully');
}

/**
 * Update editor content (for editing existing articles)
 */
function updateMarkdownEditorContent(content) {
    if (markdownEditorInstance) {
        markdownEditorInstance.setContent(content || '');
    }
}

/**
 * Destroy Markdown Editor instance
 */
function destroyMarkdownEditor() {
    if (markdownEditorInstance) {
        markdownEditorInstance.destroy();
        markdownEditorInstance = null;
    }
}

/**
 * Initialize on page load
 */
function initOnPageLoad() {
    // Small delay to ensure Livewire has rendered
    setTimeout(() => {
        const textarea = document.getElementById('markdown-editor');
        if (textarea) {
            // Check if modal is open (textarea is visible)
            const wrapper = textarea.closest('.markdown-editor-wrapper');
            if (wrapper && wrapper.offsetParent !== null) {
                initializeMarkdownEditor();
            }
        }
    }, 100);
}

// Listen for Livewire initialization
document.addEventListener('livewire:init', function() {
    console.log('Livewire initialized, setting up Markdown Editor hooks');

    // Initialize after Livewire message is processed
    Livewire.hook('message.processed', (message, component) => {
        if (component.name === 'artikel-management') {
            // Check if textarea exists and is visible
            const textarea = document.getElementById('markdown-editor');
            if (textarea) {
                // Tiny delay to ensure DOM is ready
                setTimeout(() => {
                    const wrapper = textarea.closest('.markdown-editor-wrapper');
                    if (wrapper && wrapper.offsetParent !== null) {
                        // Only initialize if not already initialized
                        if (!markdownEditorInstance) {
                            initializeMarkdownEditor();
                        }
                    }
                }, 100);
            }
        }
    });
});

// Listen for markdown-editor-init event from Livewire
document.addEventListener('markdown-editor-init', function() {
    console.log('Received markdown-editor-init event');
    initializeMarkdownEditor();
});

// Listen for markdown-editor-update event from Livewire (for editing)
Livewire.on('markdown-editor-update', ({ content }) => {
    console.log('Received markdown-editor-update event with content:', content ? `${content.substring(0, 50)}...` : 'empty');
    if (markdownEditorInstance) {
        markdownEditorInstance.setContent(content || '');
    } else {
        // Editor not initialized yet, initialize first then set content
        setTimeout(() => {
            initializeMarkdownEditor();
            if (markdownEditorInstance) {
                markdownEditorInstance.setContent(content || '');
            }
        }, 100);
    }
});

// Listen for modal close event to destroy editor
Livewire.on('modal-close', () => {
    destroyMarkdownEditor();
});

// Also try to initialize on page load if modal is already open
document.addEventListener('DOMContentLoaded', function() {
    initOnPageLoad();
});

// Cleanup on page unload
window.addEventListener('beforeunload', function() {
    destroyMarkdownEditor();
});

// Export functions for external use if needed
window.MarkdownEditorHelpers = {
    initialize: initializeMarkdownEditor,
    updateContent: updateMarkdownEditorContent,
    destroy: destroyMarkdownEditor,
};
