<?php

	require_once ("bc_daemon.php");
	require_once ("bc_layout.php");
	
	
//	If a block hash was provided the block detail is shown
	if (isset ($_REQUEST["block_hash"]))
	{
		site_header ("Block Detail Page");
		
		block_detail ($_REQUEST["block_hash"], TRUE);
	}
	
//	If a block height is provided the block detail is shown
	elseif (isset ($_REQUEST["block_height"]))
	{
		site_header ("Block Detail Page");
		
		block_detail ($_REQUEST["block_height"]);
	}
	
//	If a TXid was provided the TX Detail is shown
	elseif (isset ($_REQUEST["transaction"]))
	{
		site_header ("Transaction Detail Page");
		
		tx_detail ($_REQUEST["transaction"]);
	}
	
//	If there were no request parameters the menu is shown
	else
	{
		site_header ("GreenCoin Block Explorer");
		
		echo "	<div class=\"row\">\n";
		echo "\n";
		
		$network_info = getinfo ();

		// round ( float $val [, int $precision = 0 [, int $mode = PHP_ROUND_HALF_UP ]] 
		
		echo "		<div class=\"col-sm-3\">\n";
		echo "			<h4>Block Count: ";
		echo "			".number_format($network_info["blocks"])."</h4>\n";
		echo "		</div>\n";
		echo "\n";

		echo "		<div class=\"col-sm-3\">\n";
		echo "			<h4>Difficulty: ";
		echo "			".number_format($network_info["difficulty"])."</h4>\n";
		echo "		</div>\n";
		echo "\n";

		echo "		<div class=\"col-sm-2\">\n";
		echo "			<h4>Connections: ";
		echo "			".$network_info["connections"]."</h4>\n";
		echo "		</div>\n";
		echo "\n";

		$net_speed = getnetworkhashps ();
		
		if ($net_speed != "")
		{
			echo "		<div class=\"col-sm-4\">\n";
			echo "			<h4>Network Hashrate (GH/s): ";
			echo "			".round($net_speed/1000000000, 1, PHP_ROUND_HALF_DOWN)."</h4>\n";
			echo "		</div>\n";
			echo "\n";
		}

		echo "	</div>\n";
		echo "\n";

    // start new row
		echo "	<div class=\"row-grey\">\n";

		// start new row
		echo "	<div class=\"row\">\n";
		echo "\n";
		echo "			<form action=\"".$_SERVER["PHP_SELF"]."\" method=\"post\" class=\"form-group\">\n";
		echo "			  <br \\><label for=\"block_height\" >Enter a Block Index (Height):</label><br \\>\n";
		echo "				<input type=\"text\" name=\"block_height\" placeholder=\"Block Number\">\n";
		echo "				<input type=\"submit\" name=\"submit\" value=\"Jump To Block\" class=\"btn btn-primary\">\n";
		echo "			</form>\n";
		echo "  </div>\n";
		echo "\n";

		// start new row
		echo "	<div class=\"row\">\n";
		echo "\n";
		echo "			<form action=\"".$_SERVER["PHP_SELF"]."\" method=\"post\" class=\"form-group\">\n";
		echo "        <br \\><label for=\"transaction\" >Enter a Transaction ID:</label><br \\>\n";
		echo "				<input type=\"text\" name=\"transaction\" placeholder=\"TXID\" size=\"20\">\n";
		echo "				<input type=\"submit\" name=\"submit\" value=\"Jump To TXID\" class=\"btn btn-primary\">\n";
		echo "			</form>\n";
		echo "   </div>\n";
		echo "\n";

		// start new row
		echo "	<div class=\"row\">\n";
		echo "\n";
		echo "			<form action=\"".$_SERVER["PHP_SELF"]."\" method=\"post\" class=\"form-group\">\n";
		echo"         <br \\><label for=\"block_hash\" >Enter a Block Hash:</label><br \\>\n";
		echo "				<input type=\"text\" name=\"block_hash\" placeholder=\"Block Hash\" size=\"20\">\n";
		echo "				<input type=\"submit\" name=\"submit\" value=\"Jump To Block\" class=\"btn btn-primary\">\n";
		echo "			</form>\n";
		echo "		</div>\n";
		echo "\n";

		// ends the row-grey
		echo "	</div>\n";
		echo "\n";

		// ends the all three elements in the row

		echo "	</div>\n";
		echo "\n";
	}
	
	
	site_footer ();

/******************************************************************************
	This script is Copyright © 2013 Jake Paysnoe.
	I hereby release this script into the public domain.
	Jake Paysnoe Jun 26, 2013
******************************************************************************/
?>