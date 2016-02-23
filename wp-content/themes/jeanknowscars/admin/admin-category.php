<?php
// category meta for keywords, description
add_action( 'category_add_form_fields', 'add_category_seo_field' );
function add_category_seo_field($taxonomy) {
    global $feature_groups;
    ?><div class="form-field term-group">
        <label for="meta-title"><?php _e('Meta Title', 'jkc'); ?></label>
        <input name="meta-title" id="meta-title" type="text" />
        <p>This meta title will be used in category listing pages as title tag.</p>
    </div>
    <div class="form-field term-group">
        <label for="meta-keywords"><?php _e('Meta Keywords', 'jkc'); ?></label>
        <textarea name="meta-keywords" id="meta-keywords"></textarea>
        <p>This meta keywords will be used in category listing pages.</p>
    </div>
    <div class="form-field term-group">
        <label for="meta-description"><?php _e('Meta Description', 'jkc'); ?></label>
        <textarea name="meta-description" id="meta-description"></textarea>
        <p>This meta description will be used in category listing pages.</p>
    </div><?php
}

// save category meta on category creation
add_action( 'created_category', 'save_feature_category_meta', 10, 2 );

function save_feature_category_meta( $term_id, $tt_id ){
    if( isset( $_POST['meta-keywords'] ) && '' !== $_POST['meta-keywords'] ){
        $group = esc_attr( $_POST['meta-keywords'] );
        add_term_meta( $term_id, 'meta-keywords', $group, true );
    }
}

// edit category meta
add_action( 'category_edit_form_fields', 'edit_category_seo_field' );
function edit_category_seo_field( $term ) {
    global $feature_groups;
    ?><tr class="form-field term-group-wrap">
        <th scope="row"><label for="meta-title"><?php _e( 'Meta Title', 'jkc' ); ?></label></th>
        <td><input name="meta-title" id="meta-title" type="text" value="<?=get_term_meta($term->term_id, 'meta-title', true);?>" /><p class="description">This meta title will be used in category listing pages as title tag. </p></td>
    </tr><tr class="form-field term-group-wrap">
        <th scope="row"><label for="meta-keywords"><?php _e( 'Meta Keywords', 'jkc' ); ?></label></th>
        <td><textarea name="meta-keywords" rows="3" id="meta-keywords"><?=get_term_meta($term->term_id, 'meta-keywords', true);?></textarea><p class="description">This meta keywords will be used in category listing pages.</p></td>
    </tr><tr class="form-field term-group-wrap">
        <th scope="row"><label for="meta-keywords"><?php _e( 'Meta Description', 'jkc' ); ?></label></th>
        <td><textarea name="meta-description" rows="3" id="meta-description"><?=get_term_meta($term->term_id, 'meta-description', true);?></textarea><p class="description">This meta description will be used in category listing pages.</p></td>
    </tr><?php
}

// save edit category meta
add_action( 'edited_category', 'update_feature_meta', 10, 2 );

function update_feature_meta( $term_id, $tt_id ){

    if( isset( $_POST['meta-keywords'] ) && '' !== $_POST['meta-keywords'] ){
        $keywords = esc_attr( $_POST['meta-keywords'] );
        update_term_meta( $term_id, 'meta-keywords', $keywords );
    }

    if( isset( $_POST['meta-title'] ) && '' !== $_POST['meta-title'] ){
        $title = esc_attr( $_POST['meta-title'] );
        update_term_meta( $term_id, 'meta-title', $title );
    }

    if( isset( $_POST['meta-description'] ) && '' !== $_POST['meta-description'] ){
        $description = esc_attr( $_POST['meta-description'] );
        update_term_meta( $term_id, 'meta-description', $description );
    }
}