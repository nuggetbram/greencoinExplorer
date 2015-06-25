/* This function takes greencoins inside of "green buttons" and converts the value to the current kg CO2
that the greencoins represent. Currently the 'amount' argument is not needed. This function 
needs to be redone to not use innerHTML because there isn't a way I can tell to get the old 
greencoin value back. In fact there is an error if you hit the button twice that produces NaN.
So currently it is kind of buggy in that you can only click the GreenCoin value once to get to 
kg CO2 abut can't go back. I wiould ultimately like to have it work like Coinbase's site does where you
can toggle back and forth between GreenCoins and CO2 (and eventually price, or have that be a hover-over).

-This may mean (most likely) interfacing with a database. If we go this ruote it might be worth planning out
the entire block explorer again from scratch because there could be a lot of powerful things we can do.

- As of 6/24/15 the kg CO2 per Gre figure is currently hard coded in (31727.58 GRE/KgCO2). 
I will update this to be a function of the value listed on the GreenCoin homepage* in the near future but
*http://www.grcoin.com/pages/our_network
I just wanted to get something out to get started. */

function convert_gre_co2 (amount)
{
	var gre_amount = amount;
  i = 0;
  while (document.getElementById("tx_amounts_" + i)) {
  	document.getElementById("tx_amounts_" + i).innerHTML = (document.getElementById("tx_amounts_" + i).innerHTML/31727.58).toFixed(2) + " kg CO2";
  	document.getElementById("tx_amounts_" + i).className = "btn btn-custom";
  	i++;
  }
}

