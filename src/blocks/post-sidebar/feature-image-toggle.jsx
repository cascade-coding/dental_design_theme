import { registerPlugin } from '@wordpress/plugins';
import { PluginPostStatusInfo } from '@wordpress/edit-post';
import { CheckboxControl } from '@wordpress/components';
import { withSelect, withDispatch } from '@wordpress/data';
import { compose } from '@wordpress/compose';

const FeatureToggle = ({ value, setValue }) => {
	return (
		<PluginPostStatusInfo>
			<CheckboxControl
				label="Show Featured Image on Post"
				checked={!!value}
				onChange={(checked) => setValue(checked)}
			/>
		</PluginPostStatusInfo>
	);
};

const FeatureTogglePanel = compose(
	withSelect((select) => ({
		value: select('core/editor').getEditedPostAttribute('meta')['_show_feature_image'],
	})),
	withDispatch((dispatch) => ({
		setValue: (val) => dispatch('core/editor').editPost({
			meta: { _show_feature_image: val }
		}),
	}))
)(FeatureToggle);

registerPlugin('mytheme-feature-image-toggle', {
	render: FeatureTogglePanel,
	icon: null,
});
