CREATE TABLE eventos (
 fechahora TIMESTAMP WITH TIME ZONE default NOW(),
 nomb_tabla text,
 usuario text,
 comando text
);

CREATE OR REPLACE FUNCTION grabar_eventos() RETURNS TRIGGER AS $$
 DECLARE
 BEGIN

 INSERT INTO eventos (
 nomb_tabla,
 usuario,
 comando)
 VALUES (
 TG_TABLE_NAME,
 CURRENT_USER,
 TG_OP
 );
 RETURN NULL;
 END;
$$ LANGUAGE plpgsql;

CREATE TRIGGER eventos_peliculas AFTER INSERT OR UPDATE OR DELETE
 ON peliculas FOR EACH STATEMENT
 EXECUTE PROCEDURE grabar_eventos();

CREATE TRIGGER eventos_peliculas AFTER INSERT OR UPDATE OR DELETE
 ON reparto FOR EACH STATEMENT
 EXECUTE PROCEDURE grabar_eventos();

CREATE TRIGGER eventos_peliculas AFTER INSERT OR UPDATE OR DELETE
 ON tiene FOR EACH STATEMENT
 EXECUTE PROCEDURE grabar_eventos();

CREATE TRIGGER eventos_peliculas AFTER INSERT OR UPDATE OR DELETE
 ON cartelera FOR EACH STATEMENT
 EXECUTE PROCEDURE grabar_eventos();

CREATE TRIGGER eventos_peliculas AFTER INSERT OR UPDATE OR DELETE
 ON salas FOR EACH STATEMENT
 EXECUTE PROCEDURE grabar_eventos();

CREATE TRIGGER eventos_peliculas AFTER INSERT OR UPDATE OR DELETE
 ON tiquete FOR EACH STATEMENT
 EXECUTE PROCEDURE grabar_eventos();

CREATE TRIGGER eventos_peliculas AFTER INSERT OR UPDATE OR DELETE
 ON usuarios FOR EACH STATEMENT
 EXECUTE PROCEDURE grabar_eventos();

CREATE TRIGGER eventos_peliculas AFTER INSERT OR UPDATE OR DELETE
 ON taquilla FOR EACH STATEMENT
 EXECUTE PROCEDURE grabar_eventos();

CREATE TRIGGER eventos_peliculas AFTER INSERT OR UPDATE OR DELETE
 ON empleados FOR EACH STATEMENT
 EXECUTE PROCEDURE grabar_eventos();


-- Viasta de cartelera del dia
create or replace view fechdia as Select c.cod_pelicula,p.nomb_pelicula,s.tipo_sala,c.horario,p.clasificacion from salas s join cartelera c on s.cod_sala=c.cod_sala join peliculas p on p.cod_pelicula=c.cod_pelicula 
where c.fecha=current_date and c.horario>=current_time;
