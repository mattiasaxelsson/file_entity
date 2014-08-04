<?php

/**
 * @file
 * Definition of Drupal\file_entity\Plugin\views\filter\Type.
 */

namespace Drupal\file_entity\Plugin\views\filter;

use Drupal\views\Plugin\views\filter\InOperator;

/**
 * Filter by type.
 *
 * @ingroup views_filter_handlers
 *
 * @ViewsFilter("file_entity_type")
 */
class Type extends InOperator {

  /**
   * Gets the values of the options.
   *
   * @return array
   *   Returns options.
   */
  public function getValueOptions() {
    if (!isset($this->value_options)) {
      // Load entity File.
      $result = entity_load_multiple('file_type');

      // Creates associative array of candidates.
      $candidates = array();
      foreach ($result as $type) {
        $candidates[$type->id()] = $type->label();
      }

      // Returns candidates.
      $this->value_options = $candidates;
    }
  }

}