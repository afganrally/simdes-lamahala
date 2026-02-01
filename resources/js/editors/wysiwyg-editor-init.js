import WysiwygEditor from './WysiwygEditor.js';
import '../../css/wysiwyg-editor.css';

/**
 * Global instance of WYSIWYG Editor
 */
let wysiwygEditorInstance = null;

/**
 * Initialize WYSIWYG Editor
 */
function initializeWysiwygEditor() {
    // Destroy existing instance if any
    if (wysiwygEditorInstance) {
        wysiwygEditorInstance.destroy();
        wysiwygEditorInstance = null;
    }

    // Check if textarea exists
    const textarea = document.getElementById('wysiwyg-editor');
    if (!textarea) {
        console.log('WYSIWYG editor textarea not found');
        return;
    }

    // Create new editor instance
    wysiwygEditorInstance = new WysiwygEditor('wysiwyg-editor', {
        height: '400px',
        maxHeight: '600px',
        toolbar: true,
    });

    // Initialize the editor
    wysiwygEditorInstance.init();

    console.log('WYSIWYG Editor initialized successfully');
}

/**
 * Update editor content (for editing existing articles)
 */
function updateWysiwygEditorContent(content) {
    if (wysiwygEditorInstance) {
        wysiwygEditorInstance.setContent(content || '');
    }
}

/**
 * Destroy WYSIWYG Editor instance
 */
function destroyWysiwygEditor() {
    if (wysiwygEditorInstance) {
        wysiwygEditorInstance.destroy();
        wysiwygEditorInstance = null;
    }
}

/**
 * Initialize on page load
 */
function initOnPageLoad() {
    // Small delay to ensure Livewire has rendered
    setTimeout(() => {
        const textarea = document.getElementById('wysiwyg-editor');
        if (textarea) {
            // Check if modal is open (textarea is visible)
            const wrapper = textarea.closest('.wysiwyg-editor-wrapper');
            if (wrapper && wrapper.offsetParent !== null) {
                initializeWysiwygEditor();
            }
        }
    }, 100);
}

// Listen for Livewire initialization
document.addEventListener('livewire:init', function() {
    console.log('Livewire initialized, setting up WYSIWYG Editor hooks');

    // Initialize after Livewire message is processed
    Livewire.hook('message.processed', (message, component) => {
        if (component.name === 'artikel-management') {
            // Check if textarea exists and is visible
            const textarea = document.getElementById('wysiwyg-editor');
            if (textarea) {
                // Tiny delay to ensure DOM is ready
                setTimeout(() => {
                    const wrapper = textarea.closest('.wysiwyg-editor-wrapper');
                    if (wrapper && wrapper.offsetParent !== null) {
                        // Only initialize if not already initialized
                        if (!wysiwygEditorInstance) {
                            initializeWysiwygEditor();
                        }
                    }
                }, 100);
            }
        }
    });
});

// Listen for wysiwyg-editor-init event from Livewire
document.addEventListener('wysiwyg-editor-init', function() {
    console.log('Received wysiwyg-editor-init event');
    initializeWysiwygEditor();
});

// Listen for wysiwyg-editor-update event from Livewire (for editing)
Livewire.on('wysiwyg-editor-update', ({ content }) => {
    console.log('Received wysiwyg-editor-update event with content:', content ? `${content.substring(0, 50)}...` : 'empty');
    if (wysiwygEditorInstance) {
        wysiwygEditorInstance.setContent(content || '');
    } else {
        // Editor not initialized yet, initialize first then set content
        setTimeout(() => {
            initializeWysiwygEditor();
            if (wysiwygEditorInstance) {
                wysiwygEditorInstance.setContent(content || '');
            }
        }, 100);
    }
});

// Listen for modal close event to destroy editor
Livewire.on('modal-close', () => {
    destroyWysiwygEditor();
});

// Also try to initialize on page load if modal is already open
document.addEventListener('DOMContentLoaded', function() {
    initOnPageLoad();
});

// Cleanup on page unload
window.addEventListener('beforeunload', function() {
    destroyWysiwygEditor();
});

// Export functions for external use if needed
window.WysiwygEditorHelpers = {
    initialize: initializeWysiwygEditor,
    updateContent: updateWysiwygEditorContent,
    destroy: destroyWysiwygEditor,
};
