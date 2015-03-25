<?php
/**
 * Copyright 2014 Facebook, Inc.
 *
 * You are hereby granted a non-exclusive, worldwide, royalty-free license to
 * use, copy, modify, and distribute this software in source code or binary
 * form for use in connection with the web services and APIs provided by
 * Facebook.
 *
 * As with any software that integrates with the Facebook platform, your use
 * of this software is subject to the Facebook Developer Principles and
 * Policies [http://developers.facebook.com/policy/]. This copyright notice
 * shall be included in all copies or substantial portions of the software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL
 * THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
 * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER
 * DEALINGS IN THE SOFTWARE.
 *
 */

namespace FacebookAds\Object;

use FacebookAds\Object\Fields\ProductSetFields;
use FacebookAds\Object\Traits\FieldValidation;
use FacebookAds\Cursor;

class ProductSet extends AbstractCrudObject {
  use FieldValidation;

  /**
   * @var string[]
   */
  protected static $fields = array(
    ProductSetFields::ID,
    ProductSetFields::NAME,
    ProductSetFields::FILTER,
  );

  /**
   * @return string
   */
  protected function getEndpoint() {
    return 'product_sets';
  }

  /**
   * @param array $fields
   * @param array $params
   * @return Cursor
   */
  public function getProducts(
    array $fields = array(), array $params = array()) {
    return $this->getManyByConnection(
      Product::className(), $fields, $params);
  }

  /**
   * @param array $fields
   * @param array $params
   * @return Cursor
   */
  public function getProductGroups(
    array $fields = array(), array $params = array()) {
    return $this->getManyByConnection(
      ProductGroup::className(), $fields, $params, 'product_groups');
  }
}