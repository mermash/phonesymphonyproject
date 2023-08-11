-- total balance for each user
SELECT u.id, u.name AS user_name, SUM(ph.balance) AS total_balance
FROM `civenty`.`user` u
JOIN `civenty`. `phone_number` ph ON ph.phone_user_id = u.id
GROUP BY u.id

-- number of phone numbers for each operator
SELECT op.code AS operator_code, COUNT(ph.id) AS count_phone_numbers
FROM `civenty`.`phone_number` ph
JOIN `civenty`.`phone_operator` op ON op.id = ph.operator_id
GROUP BY op.code

-- number of phone numbers for each user
SELECT u.name AS user_name, COUNT(ph.id) AS count_phone_numbers
FROM `civenty`.`user` u
JOIN `civenty`.`phone_number` ph ON ph.phone_user_id = u.id
GROUP BY u.id


-- top 10 max balance
-- SELECT DISTINCT u.name AS user_name, ph.balance AS max_balance
-- FROM `civenty`.`user` u
-- JOIN `civenty`.`phone_number` ph ON ph.phone_user_id = u.id
-- ORDER BY ph.balance DESC LIMIT 10

SELECT u.name AS user_name, MAX(ph.balance) AS max_balance
FROM `civenty`.`user` u
JOIN `civenty`.`phone_number` ph ON ph.phone_user_id = u.id
GROUP BY u.name
ORDER BY MAX(ph.balance) DESC LIMIT 10

