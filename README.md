# Difusion

La idea es hacer un sistema para:
1) la asignación de actividades a los monitores
2) llenado de ficha tras las actividades por parte de los monitores
3) el cálculo de honorarios para cada monitor según sus actividades/horas mensualess
4) la publicación fácil de nuevas actividades
5) automatización de envío de avisos para nuevas actividades, actividades asignadas y recordatorio pre-actividad.

Requisitos:
Admin:
- Publicar nuevas actividades y dar tiempo de postulación
- Extender tiempo de postulación
- Asignar monitores a cierta actividad
- Reasignar monitores tras solicitud de parte del asignado
- Ver estadísticas de horas y honorarios de cada monitor histórico y del mes en curso


Monitor:
- Ver las actividades publicadas
- Postular a una actividad 
- Visor de actividades asignadas; auto-envío de recordatorio el día anterior
- Modificación de sus datos (si quiere diff con los de u-pasaporte?)
- Solicitar renunciar a una actividad asignada
- Llenar ficha tras completar una actividad



-------------------------------------


Estructura BD:

Monitores 
(id [int pk], nombre [varchar not null], RUT [varchar not null], email [varchar not null], teléfono [int?], colegio_origen [varchar not null], tipo_colegio_origen[varchar(tipo_colegio) not null])

Actividades 
(id [int pk], nombre [varchar not null], hora_inicio [datetime not null], hora_fin [datetime not null], id_tipo_actividad [varchar(tipo_actividad) not null])

Asignación 
(id [int pk], id_actividad [int not null], id_monitor [int not null], activo [bool not null])

Ficha 
(id [int pk], id_asignacion[int not null], comentarios [varchar], n_horas [int not null], pagado [bool not null])


tipo_colegio: municipal, subvencionado, particular
tipo_actividad: (id, tipo, pago/H) -> tipos: feria, visita, administrativa. 
