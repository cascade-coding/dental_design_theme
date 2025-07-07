import { registerBlockType } from '@wordpress/blocks';
import {
  InspectorControls,
  InnerBlocks,
  useBlockProps,
} from '@wordpress/block-editor';
import {
  PanelBody,
  SelectControl,
} from '@wordpress/components';

const COLORS = [
  { label: 'White', value: 'bg-white' },
  { label: 'Gray', value: 'bg-gray-100' },
  { label: 'Yellow', value: 'bg-yellow-100' },
  { label: 'Blue', value: 'bg-blue-100' },
  { label: 'Neutral', value: 'bg-neutral-100' },
];

registerBlockType('mytheme/section-block', {
  title: 'Section Block',
  icon: 'screenoptions',
  category: 'layout',
  attributes: {
    backgroundColor: {
      type: 'string',
      default: 'bg-white',
    },
  },
  edit({ attributes, setAttributes }) {
    const blockProps = useBlockProps({
      className: `${attributes.backgroundColor} p-6 rounded-md`,
    });

    return (
      <>
        <InspectorControls>
          <PanelBody title="Background Color">
            <SelectControl
              label="Pick Background Color"
              value={attributes.backgroundColor}
              options={COLORS}
              onChange={(val) => setAttributes({ backgroundColor: val })}
            />
          </PanelBody>
        </InspectorControls>
        <div {...blockProps}>
          <InnerBlocks />
        </div>
      </>
    );
  },
  save({ attributes }) {
    const blockProps = useBlockProps.save({
      className: `${attributes.backgroundColor} p-6 rounded-md`,
    });

    return (
      <div {...blockProps}>
        <InnerBlocks.Content />
      </div>
    );
  },
});
