/* This procedure will insert a record for a sell in the OpenOrders table.
 * @author Brittany Dighton
 */

DROP PROCEDURE IF EXISTS insertSell;

delimiter //
CREATE PROCEDURE insertSell(
	IN userID_in  int(11),
	IN stockSymbol_in  varchar(50),
	IN shares_in int(11),
	IN price_in  numeric(13,2)
	)
	
BEGIN

INSERT INTO OpenOrders (userID, stockSymbol, shares, orderType, price, requestTime) 
	VALUES (userID_in, stockSymbol_in, shares_in,
	(SELECT `typeID` FROM OrderTypes WHERE `description` LIKE 'Sell'), 
	price_in, NOW());
END;
//

delimiter ;

	