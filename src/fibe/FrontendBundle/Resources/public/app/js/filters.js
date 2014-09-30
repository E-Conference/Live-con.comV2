'use strict';

/**
 * Global filters
 */

/**
 * Checkmark filter
 *
 * Description :
 * Convert boolean values to unicode checkmark (v) or cross (x)
 * (true --> check image, false --> cross image)
 *
 * @type {filter}
 */
angular.module('sympozerFilters', []).filter('checkmark', function ()
{
  return function (input)
  {
    return input ? '\u2713' : '\u2718';
  };
});
