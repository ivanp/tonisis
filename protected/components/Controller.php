<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
	
	public $navigation=array();
	
	protected function beforeRender($view)
	{
		if(Yii::app()->user->isGuest)
		{
			$this->navigation=array(
				array('label'=>'Login', 'url'=>array('/site/login')),
			);
		}
		else
		{
			$this->navigation=array(
				array('label'=>'Dashboard', 'url'=>array('/site/index')),
				array('label'=>'Pelanggan', 'url'=>array('/pelanggan/index')),
				array('label'=>'Produk', 'url'=>array('/produk/index')),
				array('label'=>'Pemasok', 'url'=>array('/pemasok/index')),
				array('label'=>'Penjualan', 'url'=>array('/penjualan/index')),
				array('label'=>'Pembelian', 'url'=>array('/pembelian/index')),
				array('label'=>'Laporan', 'url'=>array('/laporan/index')),
				array('label'=>'Merk', 'url'=>array('/merk/index')),
				array('label'=>'Jenis', 'url'=>array('/jenis/index')),
//				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Logout', 'url'=>array('/site/logout'), 'itemOptions'=>array('class'=>'logout'))
			);
		}
		return true;
	}
}