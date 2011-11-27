<?php
/**
 * This is the configuration for generating message translations
 * for the Yii framework. It is used by the 'yiic message' command.
 */
return array(
	'sourcePath'=>BASE_DIR.'/protected',
	'messagePath'=>BASE_DIR.'/protected/messages',
	'languages'=>array('id'),
	'fileTypes'=>array('php'),
    'overwrite'=>true,
	'exclude'=>array(
		'.svn',
		'yiilite.php',
		'yiit.php',
		'/i18n/data',
		'/messages',
//		'/vendors',
//		'/protected/vendors',
		'/web/js',
	),
);
