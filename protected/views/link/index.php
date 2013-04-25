<?php
/**
 * @author Nikita Melnikov <nickswdit@gmail.com>
 * @link https://github.com/shogodev/argilla/
 * @copyright Copyright &copy; 2003-2013 Shogo
 * @license http://argilla.ru/LICENSE
 *
 * @var LinkController $this
 * @var FActiveDataProvider $dataProvider
 */
$this->widget('FListView', [
    'dataProvider' => $dataProvider,
    'itemView' => 'section_link',
  ]
);