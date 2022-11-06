<?php

namespace MyTheme\Walkers;

defined('ABSPATH') || exit;

class MainMenu extends \Walker_Nav_Menu {
	public function start_lvl(&$output, $depth = 0, $args = []): void {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul role='menu' class='dropdown-menu ul-clean'>\n";
	}

	public function start_el(&$output, $item, $depth = 0, $args = [], $id = 0): void {
		$indent = $depth ? str_repeat("\t", $depth) : '';
		$item_id = 'menu-item-' . $item->ID;
		$type = get_field('ego_type', $item->ID);
		$item_class = !empty($item->classes) ? join(' ', array_filter($item->classes)) : '';
		$item_class .= ' ' . $item_id;

		if ($args->has_children) {
			$item_class .= ' dropdown';
		}

		$item_attrs = $item_class ? ' class="' . $item_class . '"' : '';
		$item_attrs .= ' id="' . $item_id . '"';
		$output .= $indent . '<li' . $item_attrs . '>';
		$attrs = !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
		$title = $item->title;

		if (0 === $depth && $args->has_children) {
			$attrs .= ' type="button" class="dropdown-toggle" data-toggle="dropdown"';

		} elseif ('tel' === $type) {
			$attrs .= ' href="' . esc_attr($title) . '"';

		} else {
			$attrs .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
			$attrs .= !empty($item->url) ? ' href="' . esc_url($item->url) . '"' : '';
		}

		$output .= $args->before;
		$icon_tel = '<span class="ego-icon ego-icon_tel"></span>';

		if (0 === $depth && $args->has_children) {
			$output .= '<button' . $attrs . '>' . ('tel' === $type ? $icon_tel : '');

		} else {
			$output .= '<a' . $attrs . '>' . ('tel' === $type && 0 === $depth ? $icon_tel : '');
		}

		$output .= $args->link_before . $title . $args->link_after;
		$icon_caret = '<span class="ego-icon ego-icon_caret"></span>';

		if (0 === $depth && $args->has_children) {
			$output .= $icon_caret . '</button>';

		} else {
			$output .= '</a>';
		}

		$output .= $args->after;
	}

	public function display_element($element, &$children_elements, $max_depth, $depth, $args, &$output): void {
		if (!$element) {
			return;
		}

		$id_field = $this->db_fields['id'];
		$max_depth = 2;

		if (is_object($args[0])) {
			$args[0]->has_children = !empty($children_elements[$element->$id_field]);
		}

		parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
	}
}
