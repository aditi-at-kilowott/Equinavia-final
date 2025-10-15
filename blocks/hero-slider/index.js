( function( blocks, blockEditor, element ) {
  const { InnerBlocks, useBlockProps } = blockEditor;
  const el = element.createElement;

  const TEMPLATE = [
    ['equinavia/hero-slide', {}],
    ['equinavia/hero-slide', {}],
    ['equinavia/hero-slide', {}],
    ['equinavia/hero-slide', {}],
  ];

  blocks.registerBlockType('equinavia/hero-slider', {
    edit() {
      const blockProps = useBlockProps({ className: 'eqn-hero-slider' });
      return el('div', blockProps,
        el(InnerBlocks, {
          allowedBlocks: ['equinavia/hero-slide'],
          template: TEMPLATE,
          templateLock: false
        })
      );
    },
    save() {
      // Dynamic wrapper, children are saved by hero-slide.
      return null;
    }
  });
})( window.wp.blocks, window.wp.blockEditor, window.wp.element );
