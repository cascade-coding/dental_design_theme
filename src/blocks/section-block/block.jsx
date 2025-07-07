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
  { label: 'Primary-400', value: 'bg-primary-400' },
  { label: 'Primary-500', value: 'bg-primary-500' },
  { label: 'Primary-600', value: 'bg-primary-600' },
  { label: 'Primary-700', value: 'bg-primary-700' },
  { label: 'Primary-800', value: 'bg-primary-800' },
  { label: 'Primary-900', value: 'bg-primary-900' },
  { label: 'Neutral-500', value: 'bg-neutral-500' },
  { label: 'Neutral-600', value: 'bg-neutral-600' },
  { label: 'Neutral-700', value: 'bg-neutral-700' },
  { label: 'Neutral-800', value: 'bg-neutral-800' },
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
      className: `${attributes.backgroundColor} p-6`,
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
      className: `${attributes.backgroundColor} p-6`,
    });

    return (
      <div {...blockProps}>
        <InnerBlocks.Content />
      </div>
    );
  },
});
