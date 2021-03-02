function summaryPlugin() {
    Editor.codeBlockManager.setReplacer('summary', () => {
        return '<summary></summary>';
    });
}
