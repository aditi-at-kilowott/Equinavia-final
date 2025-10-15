(function (blocks, element, blockEditor, components) {
  const el = element.createElement;
  const { useBlockProps, RichText, MediaUpload, InspectorControls, URLInputButton } = blockEditor;
  const { Button, PanelBody, RangeControl } = components;

  blocks.registerBlockType('equinavia/hero-promo', {
    edit: function (props) {
      const { attributes, setAttributes } = props;
      const { eyebrow, title, buttonText, buttonUrl, imageURL, imageID, dim } = attributes;
      const blockProps = useBlockProps({ className: 'eqn-hero-promo' });

      const onSelectImage = (media) => setAttributes({ imageID: media.id, imageURL: media.url });

      return el(
        element.Fragment,
        null,
        el(
          InspectorControls,
          {},
          el(
            PanelBody,
            { title: 'Background' },
            el(MediaUpload, {
              onSelect: onSelectImage,
              allowedTypes: ['image'],
              value: imageID,
              render: ({ open }) => el(Button, { onClick: open, isSecondary: true }, imageURL ? 'Change image' : 'Choose image')
            }),
            el(RangeControl, {
              label: 'Overlay darkness',
              min: 0,
              max: 80,
              value: dim,
              onChange: (v) => setAttributes({ dim: v })
            })
          ),
          el(
            PanelBody,
            { title: 'Button link' },
            el(URLInputButton, { url: buttonUrl, onChange: (url) => setAttributes({ buttonUrl: url }) })
          )
        ),
        el(
          'div',
          Object.assign({}, blockProps, { style: imageURL ? { backgroundImage: `url(${imageURL})` } : {} }),
          el('span', { className: 'eqn-hero-promo__overlay', style: { opacity: dim / 100 } }),
          el(
            'div',
            { className: 'eqn-hero-promo__inner' },
            el(RichText, {
              tagName: 'span',
              className: 'eqn-hero-promo__eyebrow',
              placeholder: 'Featured Collection',
              value: eyebrow,
              onChange: (v) => setAttributes({ eyebrow: v })
            }),
            el(RichText, {
              tagName: 'h2',
              className: 'eqn-hero-promo__title',
              placeholder: 'Title…',
              value: title,
              onChange: (v) => setAttributes({ title: v })
            }),
            el(RichText, {
              tagName: 'a',
              className: 'eqn-hero-promo__btn',
              placeholder: 'Shop Now',
              value: buttonText,
              onChange: (v) => setAttributes({ buttonText: v }),
              href: buttonUrl
            })
          )
        )
      );
    },
    save: function () {
      // Dynamic (PHP) render.
      return null;
    }
  });
})(window.wp.blocks, window.wp.element, window.wp.blockEditor, window.wp.components);