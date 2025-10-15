( function( blocks, element, blockEditor, components ) {
  const el = element.createElement;
  const { useBlockProps, RichText, MediaUpload, InspectorControls, URLInputButton } = blockEditor;
  const { Button, PanelBody, RangeControl } = components;

  blocks.registerBlockType('equinavia/hero-slide', {
    edit( props ) {
      const { attributes, setAttributes } = props;
      const { eyebrow, title, buttonText, buttonUrl, imageURL, imageID, dim } = attributes;
      const blockProps = useBlockProps({ className: 'eqn-hero-slide' });

      const onSelectImage = (media) => setAttributes({ imageID: media.id, imageURL: media.url });

      return el( element.Fragment, null,
        el( InspectorControls, {},
          el( PanelBody, { title: 'Background' },
            el( MediaUpload, {
              onSelect: onSelectImage,
              allowedTypes: ['image'],
              value: imageID,
              render: ({ open }) => el( Button, { onClick: open, isSecondary: true }, imageURL ? 'Change image' : 'Choose image' )
            }),
            el( RangeControl, {
              label: 'Overlay darkness',
              min: 0, max: 80, value: dim,
              onChange: (v) => setAttributes({ dim: v })
            })
          ),
          el( PanelBody, { title: 'Button' },
            el( URLInputButton, { url: buttonUrl, onChange: (url) => setAttributes({ buttonUrl: url }) } )
          )
        ),
        el( 'div',
          Object.assign({}, blockProps, { style: imageURL ? { backgroundImage: `url(${imageURL})` } : {} }),
          el('span', { className: 'eqn-hero-slide__overlay', style: { opacity: dim/100 } }),
          el('div', { className: 'eqn-hero-slide__inner' },
            el(RichText, {
              tagName: 'span',
              className: 'eqn-hero-slide__eyebrow',
              value: eyebrow, placeholder: 'Eyebrow…',
              onChange: (v) => setAttributes({ eyebrow: v })
            }),
            el(RichText, {
              tagName: 'h2',
              className: 'eqn-hero-slide__title',
              value: title, placeholder: 'Title…',
              onChange: (v) => setAttributes({ title: v })
            }),
            el(RichText, {
              tagName: 'a',
              className: 'eqn-hero-slide__btn',
              value: buttonText, placeholder: 'Button text…',
              onChange: (v) => setAttributes({ buttonText: v }),
              href: buttonUrl
            })
          )
        )
      );
    },
    save( props ) {
      const { eyebrow, title, buttonText, buttonUrl, imageURL, dim } = props.attributes;
      // Static save: parent wraps with Swiper
      return wp.element.createElement( 'div',
        { className: 'eqn-hero-slide swiper-slide', style: imageURL ? { backgroundImage: `url(${imageURL})` } : {} },
        wp.element.createElement( 'span', { className: 'eqn-hero-slide__overlay', style: { opacity: dim/100 } } ),
        wp.element.createElement( 'div', { className: 'eqn-hero-slide__inner' },
          eyebrow && wp.element.createElement( 'span', { className: 'eqn-hero-slide__eyebrow' }, eyebrow ),
          title && wp.element.createElement( 'h2', { className: 'eqn-hero-slide__title' }, title ),
          (buttonText && buttonUrl) && wp.element.createElement( 'a', { className: 'eqn-hero-slide__btn', href: buttonUrl }, buttonText )
        )
      );
    }
  });
})( window.wp.blocks, window.wp.element, window.wp.blockEditor, window.wp.components );