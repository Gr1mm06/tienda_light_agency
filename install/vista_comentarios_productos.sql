CREATE VIEW comentarios_productos AS 
SELECT prod.nombre AS producto, mar.nombre AS marcar, prod.modelo, prod.especificaciones, prod.precio,
com.titulo, com.comentario, AVG(com.calificacion) AS calificacion_promedio
FROM comentarios AS com
LEFT JOIN productos AS prod ON prod.id = com.id_producto
LEFT JOIN marcas AS mar ON mar.id = prod.id_marca
GROUP BY com.id_producto
ORDER BY calificacion_promedio DESC