<?php

fucntion connectDatabese()
{
	try
	{
		return new PDO(DSN,USER,PASSWORD)
	}
	catch (PDOExection $e)
	{
		echo $e->getMessage();
		exit;
	}
}

function h($s)
{
	return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
}
