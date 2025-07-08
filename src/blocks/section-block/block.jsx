import { registerBlockType } from "@wordpress/blocks";
import {
  InspectorControls,
  InnerBlocks,
  useBlockProps,
} from "@wordpress/block-editor";
import {
  PanelBody,
  SelectControl,
  ColorPicker,
  RangeControl,
  ToggleControl,
} from "@wordpress/components";

const COLORS = [
  { label: "White", value: "bg-white" },
  { label: "Gray", value: "bg-gray-100" },
  { label: "Yellow", value: "bg-yellow-100" },
  { label: "Blue", value: "bg-blue-100" },
  { label: "Neutral", value: "bg-neutral-100" },
  { label: "Primary-400", value: "bg-primary-400" },
  { label: "Primary-500", value: "bg-primary-500" },
  { label: "Primary-600", value: "bg-primary-600" },
  { label: "Primary-700", value: "bg-primary-700" },
  { label: "Primary-800", value: "bg-primary-800" },
  { label: "Primary-900", value: "bg-primary-900" },
  { label: "Neutral-500", value: "bg-neutral-500" },
  { label: "Neutral-600", value: "bg-neutral-600" },
  { label: "Neutral-700", value: "bg-neutral-700" },
  { label: "Neutral-800", value: "bg-neutral-800" },
];

registerBlockType("dental-design/section-block", {
  title: "Section Block",
  icon: "screenoptions",
  category: "layout",
  attributes: {
    useCustomBg: { type: "boolean", default: false },
    backgroundColor: { type: "string", default: "bg-white" },
    customBgColor: { type: "string", default: "#ffffff" },
    paddingTop: { type: "number", default: 20 },
    paddingBottom: { type: "number", default: 20 },
    paddingLeft: { type: "number", default: 20 },
    paddingRight: { type: "number", default: 20 },
  },

  edit({ attributes, setAttributes }) {
    const {
      backgroundColor,
      customBgColor,
      useCustomBg,
      paddingTop,
      paddingBottom,
      paddingLeft,
      paddingRight,
    } = attributes;

    const blockProps = useBlockProps({
      className: `${useCustomBg ? "" : backgroundColor} wp-block-dental-design-section-block`,
      style: {
        backgroundColor: useCustomBg ? customBgColor : undefined,
        paddingTop: `${paddingTop}px`,
        paddingBottom: `${paddingBottom}px`,
        paddingLeft: `${paddingLeft}px`,
        paddingRight: `${paddingRight}px`,
      },
    });

    return (
      <>
        <InspectorControls>
          <PanelBody title="Background Color" initialOpen={true}>
            <ToggleControl
              label="Use Custom Color"
              checked={useCustomBg}
              onChange={(val) => setAttributes({ useCustomBg: val })}
            />
            {useCustomBg ? (
              <ColorPicker
                label="Custom Background"
                color={customBgColor}
                onChangeComplete={(val) =>
                  setAttributes({ customBgColor: val.hex })
                }
                disableAlpha
              />
            ) : (
              <SelectControl
                label="Select Background Color"
                value={backgroundColor}
                options={COLORS}
                onChange={(val) => setAttributes({ backgroundColor: val })}
              />
            )}
          </PanelBody>

          <PanelBody title="Padding Controls" initialOpen={false}>
            <RangeControl
              label="Top Padding"
              value={paddingTop}
              onChange={(val) => setAttributes({ paddingTop: val })}
              min={0}
              max={200}
            />
            <RangeControl
              label="Bottom Padding"
              value={paddingBottom}
              onChange={(val) => setAttributes({ paddingBottom: val })}
              min={0}
              max={200}
            />
            <RangeControl
              label="Left Padding"
              value={paddingLeft}
              onChange={(val) => setAttributes({ paddingLeft: val })}
              min={0}
              max={200}
            />
            <RangeControl
              label="Right Padding"
              value={paddingRight}
              onChange={(val) => setAttributes({ paddingRight: val })}
              min={0}
              max={200}
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
    const {
      backgroundColor,
      customBgColor,
      useCustomBg,
      paddingTop,
      paddingBottom,
      paddingLeft,
      paddingRight,
    } = attributes;

    const blockProps = useBlockProps.save({
      className: `${useCustomBg ? "" : backgroundColor} wp-block-dental-design-section-block`,
      style: {
        backgroundColor: useCustomBg ? customBgColor : undefined,
        paddingTop: `${paddingTop}px`,
        paddingBottom: `${paddingBottom}px`,
        paddingLeft: `${paddingLeft}px`,
        paddingRight: `${paddingRight}px`,
      },
    });

    return (
      <>
        <div {...blockProps}>
          <InnerBlocks.Content />
        </div>

        <style>{`
          @media (max-width: 640px) {
            .wp-block-dental-design-section-block {
              padding-left: 8px !important;
              padding-right: 8px !important;
            }
          }
        `}</style>
      </>
    );
  },
});
