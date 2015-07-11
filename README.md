# Difusion

##Idea

La idea es hacer un sistema para:

1. La asignación de actividades a los monitores.
2. Llenado de ficha tras las actividades por parte de los monitores.
3. El cálculo de honorarios para cada monitor según sus actividades/horas mensualess.
4. La publicación fácil de nuevas actividades.
5. Automatización de envío de avisos para nuevas actividades, actividades asignadas y recordatorio pre-actividad.


##Requisitos

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
- Solicitar renunciar a una actividad asignada
- Llenar ficha tras completar una actividad


##Estructura BD

###Monitores

| Nombre | Tipo | Propiedad |
| ------ | ---- | --------- |
| MON_ID | intval | PK | 
| MON_NOMBRE | varchar | not null] |
| MON_RUT | varchar | not null |
| MON_EMAIL | varchar | not null | 
| MON_TELEFONO | int |  | 
| MON_COLEGIO_ORIGEN | varchar | not null | 
| MON_COLEGIO_TIPO | varchar(t_colegio) | not null |
| MON_ESTADO | bool/intval(admin?) | |

###Actividades

| Nombre | Tipo | Propiedad |
| ------ | ---- | --------- |
| ACT_ID  | intval | PK | 
| ACT_MON_ID  | intval | FK / 0 | 
| ACT_NOMBRE | varchar | not null | 
| ACT_HORA_INI | datetime | not null |
| ACT_HORA_FIN | datetime | not null |
| ACT_FECHA_FIN | datetime | not null |
| ACT_T_ACT_ID | varchar(t_actividad) | not null |
| ACT_COMENTARIOS | text | |
| ACT_HORAS_EFECT | intval | |
| ACT_ESTADO | bool/intval(activo?,renuncia?) | not null |

###Tipo de Actividad

| Nombre | Tipo | Propiedad |
| ------ | ---- | --------- |
| T_ACT_ID  | intval | PK | 
| T_ACT_NOMBRE | varchar | not null | 
| T_ACT_PAGO | intval |  |
| T_ACT_ESTADO | intval(activo?) | |

**t_actividad...** tipos: feria, visita, administrativa. 

###Codeados (?)

**t_colegio:** municipal, subvencionado, particular
