<?php

require "./vendor/autoload.php";

foreach (mb_list_encodings() as $encoding) {
	echo "use encoding [{$encoding}]\n";
	try {
		$dotenv = Dotenv\Dotenv::createImmutable(
			__DIR__,
			".env-UTF-8-with-BOM",
			true,
			$encoding
		);
		$dotenv->load();

		if (isset($_ENV['APP_KEY'])) {
			echo "ok, loaded with encoding: [{$encoding}]";
		}
	} catch (Dotenv\Exception\InvalidFileException $e) {
		echo "faild with encoding: [{$encoding}]!\n";
	}
	echo "\n";
}
