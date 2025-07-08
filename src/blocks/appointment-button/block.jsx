import { registerBlockType } from "@wordpress/blocks";
import {
  RichText,
  InspectorControls,
  useBlockProps,
} from "@wordpress/block-editor";
import {
  PanelBody,
  ColorPicker,
  RangeControl,
  ToggleControl,
} from "@wordpress/components";

import { RawHTML } from "@wordpress/element";

registerBlockType("dental-design/appointment-button", {
  title: "Appointment Button",
  icon: "calendar-alt",
  category: "common",
  attributes: {
    text: { type: "string", default: "Make an Appointment" },
    bgColor: { type: "string", default: "#FFD700" },
    textColor: { type: "string", default: "#000000" },
    width: { type: "number", default: 280 },
    fullWidth: { type: "boolean", default: false },
    paddingX: { type: "number", default: 16 },
    paddingY: { type: "number", default: 12 },
    marginTop: { type: "number", default: 10 },
    marginBottom: { type: "number", default: 10 },
    marginLeft: { type: "number", default: 0 },
    marginRight: { type: "number", default: 0 },
    borderColor: { type: "string", default: "#000000" },
    borderWidth: { type: "number", default: 1 },
    borderRadius: { type: "number", default: 20 },
  },

  edit({ attributes, setAttributes }) {
    const {
      text,
      bgColor,
      textColor,
      width,
      fullWidth,
      paddingX,
      paddingY,
      marginTop,
      marginBottom,
      marginLeft,
      marginRight,
      borderColor,
      borderWidth,
      borderRadius,
    } = attributes;

    return (
      <>
        <InspectorControls>
          <PanelBody title="Button Appearance" initialOpen={true}>
            <ToggleControl
              label="Full Width"
              checked={fullWidth}
              onChange={(val) => setAttributes({ fullWidth: val })}
            />
            {!fullWidth && (
              <RangeControl
                label="Width (px)"
                value={width}
                onChange={(val) => setAttributes({ width: val })}
                min={100}
                max={600}
              />
            )}
            <RangeControl
              label="Horizontal Padding"
              value={paddingX}
              onChange={(val) => setAttributes({ paddingX: val })}
              min={0}
              max={50}
            />
            <RangeControl
              label="Vertical Padding"
              value={paddingY}
              onChange={(val) => setAttributes({ paddingY: val })}
              min={0}
              max={50}
            />
            <RangeControl
              label="Border Radius"
              value={borderRadius}
              onChange={(val) => setAttributes({ borderRadius: val })}
              min={0}
              max={100}
            />
            <RangeControl
              label="Border Width"
              value={borderWidth}
              onChange={(val) => setAttributes({ borderWidth: val })}
              min={0}
              max={10}
            />
            <ColorPicker
              label="Border Color"
              color={borderColor}
              onChangeComplete={(val) =>
                setAttributes({ borderColor: val.hex })
              }
              disableAlpha
            />
            <ColorPicker
              label="Background Color"
              color={bgColor}
              onChangeComplete={(val) => setAttributes({ bgColor: val.hex })}
              disableAlpha
            />
            <ColorPicker
              label="Text Color"
              color={textColor}
              onChangeComplete={(val) => setAttributes({ textColor: val.hex })}
              disableAlpha
            />
          </PanelBody>

          <PanelBody title="Margin Controls" initialOpen={false}>
            <RangeControl
              label="Top Margin"
              value={marginTop}
              onChange={(val) => setAttributes({ marginTop: val })}
              min={0}
              max={100}
            />
            <RangeControl
              label="Bottom Margin"
              value={marginBottom}
              onChange={(val) => setAttributes({ marginBottom: val })}
              min={0}
              max={100}
            />
            <RangeControl
              label="Left Margin"
              value={marginLeft}
              onChange={(val) => setAttributes({ marginLeft: val })}
              min={0}
              max={100}
            />
            <RangeControl
              label="Right Margin"
              value={marginRight}
              onChange={(val) => setAttributes({ marginRight: val })}
              min={0}
              max={100}
            />
          </PanelBody>
        </InspectorControls>

        <div {...useBlockProps()}>
          <button
            className="appointment-trigger-btn cursor-pointer"
            style={{
              backgroundColor: bgColor,
              color: textColor,
              width: fullWidth ? "100%" : `${width}px`,
              padding: `${paddingY}px ${paddingX}px`,
              margin: `${marginTop}px ${marginRight}px ${marginBottom}px ${marginLeft}px`,
              border: `${borderWidth}px solid ${borderColor}`,
              borderRadius: `${borderRadius}px`,
            }}
          >
            <RichText
              tagName="span"
              value={text}
              onChange={(val) => setAttributes({ text: val })}
              placeholder="Button Text"
            />
          </button>
        </div>
      </>
    );
  },

  save({ attributes }) {
    const {
      text,
      bgColor,
      textColor,
      width,
      fullWidth,
      paddingX,
      paddingY,
      marginTop,
      marginBottom,
      marginLeft,
      marginRight,
      borderColor,
      borderWidth,
      borderRadius,
    } = attributes;

    return (
      <>
        <button
          type="button"
          className="appointment-trigger-btn cursor-pointer"
          style={{
            backgroundColor: bgColor,
            color: textColor,
            width: fullWidth ? "100%" : `${width}px`,
            padding: `${paddingY}px ${paddingX}px`,
            margin: `${marginTop}px ${marginRight}px ${marginBottom}px ${marginLeft}px`,
            border: `${borderWidth}px solid ${borderColor}`,
            borderRadius: `${borderRadius}px`,
          }}
        >
          <RichText.Content value={text} />
        </button>

        <RawHTML>
        {`
        <div class="appointment-popup w-full h-full fixed left-0 right-0 bottom-0 top-0 z-10 bg-primary-950/95 opacity-0 pointer-events-none flex flex-col items-center justify-center">
            <div class="w-[95%] sm:w-[380px]" id="appointment_popup_form">
                <!-- APPOINTMENT_FORM_PLACEHOLDER -->
            </div>
        </div>
        `}
        </RawHTML>
      </>
    );
  },
});
