SELECT u.id, u.name, SUM(ph.balance)
FROM `civenty`.`user` u
JOIN `civenty`. `phone_number` ph ON ph.phone_user_id = u.id
GROUP BY u.id

SELECT op.code, COUNT(ph.id)
FROM `civenty`.`phone_number` ph
JOIN `civenty`.`phone_operator` op ON op.id = ph.operator_id
GROUP BY op.code

SELECT u.name, COUNT(ph.id)
FROM `civenty`.`user` u
JOIN `civenty`.`phone_number` ph ON ph.phone_user_id = u.id
GROUP BY u.id

-- SELECT DISTINCT u.name, ph.balance
-- FROM `civenty`.`user` u
-- JOIN `civenty`.`phone_number` ph ON ph.phone_user_id = u.id
-- ORDER BY ph.balance DESC LIMIT 10

SELECT u.name AS user_name, MAX(ph.balance) AS max_balance
FROM `civenty`.`user` u
JOIN `civenty`.`phone_number` ph ON ph.phone_user_id = u.id
GROUP BY u.name
ORDER BY MAX(ph.balance) DESC LIMIT 10

