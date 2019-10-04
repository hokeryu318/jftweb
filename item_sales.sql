DROP VIEW IF EXISTS `item_sales`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `item_sales` AS SELECT
	dishes.name_en,
	order_dish_match.count,
    order_dish_match.total_price as total,
    order_pay.id,
    order_dish_match.order_id,
    order_dish_match.dish_id,
    order_pay.created_at, 
    order_dish_match.created_at as start_time, 
    order_dish_match.ready_time
FROM
  dishes,	
  order_dish_match,
	order_option_match,
	order_pay
WHERE
  dishes.id = order_dish_match.dish_id	
AND order_option_match.order_dish_id = order_dish_match.id 
AND order_dish_match.order_id = order_pay.order_id
ORDER BY order_dish_match.dish_id ;
SET FOREIGN_KEY_CHECKS=1;
