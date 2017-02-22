<?php
/**
 * @file
 * matter.features.inc
 */

/**
 * Implements hook_node_info().
 */
function matter_node_info() {
  $items = array(
    'matter' => array(
      'name' => t('Matter'),
      'base' => 'node_content',
      'description' => t('Matter decision tree for legal helper.'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'office_directory' => array(
      'name' => t('Office directory'),
      'base' => 'node_content',
      'description' => t('Office directory to provide legal aid information'),
      'has_title' => '1',
      'title_label' => t('Office name'),
      'help' => '',
    ),
    'outcome' => array(
      'name' => t('Outcome'),
      'base' => 'node_content',
      'description' => t('Outcome page for legal aid matters'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  drupal_alter('node_info', $items);
  return $items;
}
