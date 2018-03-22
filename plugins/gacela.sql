
CREATE SEQUENCE public.entidad_financiera_id_entidad_financiera_seq;

CREATE TABLE public.entidad_financiera (
                id_entidad_financiera INTEGER NOT NULL DEFAULT nextval('public.entidad_financiera_id_entidad_financiera_seq'),
                nombre VARCHAR(200) NOT NULL,
                estatus INTEGER DEFAULT 1 NOT NULL,
                CONSTRAINT id_entidad_financiera PRIMARY KEY (id_entidad_financiera)
);


ALTER SEQUENCE public.entidad_financiera_id_entidad_financiera_seq OWNED BY public.entidad_financiera.id_entidad_financiera;

CREATE SEQUENCE public.financiera_finanza_id_financiera_finanza_seq;

CREATE TABLE public.financiera_finanza (
                id_financiera_finanza INTEGER NOT NULL DEFAULT nextval('public.financiera_finanza_id_financiera_finanza_seq'),
                id_entidad_financiera INTEGER NOT NULL,
                n_cuenta VARCHAR(60) NOT NULL,
                n_credito VARCHAR(15) NOT NULL,
                meses_gracia INTEGER NOT NULL,
                meses_plazo INTEGER NOT NULL,
                taza_interes_anual REAL NOT NULL,
                dia_pago INTEGER NOT NULL,
                CONSTRAINT id_financiera_finanza PRIMARY KEY (id_financiera_finanza)
);


ALTER SEQUENCE public.financiera_finanza_id_financiera_finanza_seq OWNED BY public.financiera_finanza.id_financiera_finanza;

CREATE SEQUENCE public.indicador_riesgo_id_indicador_riesgo_seq;

CREATE TABLE public.indicador_riesgo (
                id_indicador_riesgo INTEGER NOT NULL DEFAULT nextval('public.indicador_riesgo_id_indicador_riesgo_seq'),
                CONSTRAINT id_indicador_riesgo PRIMARY KEY (id_indicador_riesgo)
);


ALTER SEQUENCE public.indicador_riesgo_id_indicador_riesgo_seq OWNED BY public.indicador_riesgo.id_indicador_riesgo;

CREATE SEQUENCE public.forma_afianzamiento_id_forma_afianzamiento_seq;

CREATE TABLE public.forma_afianzamiento (
                id_forma_afianzamiento INTEGER NOT NULL DEFAULT nextval('public.forma_afianzamiento_id_forma_afianzamiento_seq'),
                forma_afianzamiento VARCHAR(50) NOT NULL,
                CONSTRAINT id_forma_afianzamiento PRIMARY KEY (id_forma_afianzamiento)
);


ALTER SEQUENCE public.forma_afianzamiento_id_forma_afianzamiento_seq OWNED BY public.forma_afianzamiento.id_forma_afianzamiento;

CREATE SEQUENCE public.tipo_pago_comision_id_tipo_pago_comision_seq;

CREATE TABLE public.tipo_pago_comision (
                id_tipo_pago_comision INTEGER NOT NULL DEFAULT nextval('public.tipo_pago_comision_id_tipo_pago_comision_seq'),
                tipo_pago_comision VARCHAR(50) NOT NULL,
                estatus INTEGER DEFAULT 1 NOT NULL,
                CONSTRAINT id_tipo_pago_comision PRIMARY KEY (id_tipo_pago_comision)
);


ALTER SEQUENCE public.tipo_pago_comision_id_tipo_pago_comision_seq OWNED BY public.tipo_pago_comision.id_tipo_pago_comision;

CREATE SEQUENCE public.tipo_ingreso_fianza_id_tipo_ingreso_fianza_seq;

CREATE TABLE public.tipo_ingreso_fianza (
                id_tipo_ingreso_fianza INTEGER NOT NULL DEFAULT nextval('public.tipo_ingreso_fianza_id_tipo_ingreso_fianza_seq'),
                tipo_ingreso VARCHAR(50) NOT NULL,
                estatus INTEGER DEFAULT 1 NOT NULL,
                CONSTRAINT id_tipo_ingreso PRIMARY KEY (id_tipo_ingreso_fianza)
);


ALTER SEQUENCE public.tipo_ingreso_fianza_id_tipo_ingreso_fianza_seq OWNED BY public.tipo_ingreso_fianza.id_tipo_ingreso_fianza;

CREATE SEQUENCE public.modalidad_fianza_id_modalidad_seq;

CREATE TABLE public.modalidad_fianza (
                id_modalidad INTEGER NOT NULL DEFAULT nextval('public.modalidad_fianza_id_modalidad_seq'),
                modalidad VARCHAR(50) NOT NULL,
                estatus INTEGER DEFAULT 1 NOT NULL,
                CONSTRAINT id_modalidad_fianza PRIMARY KEY (id_modalidad)
);


ALTER SEQUENCE public.modalidad_fianza_id_modalidad_seq OWNED BY public.modalidad_fianza.id_modalidad;

CREATE SEQUENCE public.tipo_fianza_id_tipo_fianza_seq;

CREATE TABLE public.tipo_fianza (
                id_tipo_fianza INTEGER NOT NULL DEFAULT nextval('public.tipo_fianza_id_tipo_fianza_seq'),
                tipo VARCHAR(50) NOT NULL,
                estatus INTEGER DEFAULT 1 NOT NULL,
                CONSTRAINT id_tipo_fianza PRIMARY KEY (id_tipo_fianza)
);


ALTER SEQUENCE public.tipo_fianza_id_tipo_fianza_seq OWNED BY public.tipo_fianza.id_tipo_fianza;

CREATE SEQUENCE public.subtipo_fianza_id_subtipo_fianza_seq;

CREATE TABLE public.subtipo_fianza (
                id_subtipo_fianza INTEGER NOT NULL DEFAULT nextval('public.subtipo_fianza_id_subtipo_fianza_seq'),
                id_tipo_fianza INTEGER NOT NULL,
                subtipo_fianza VARCHAR(100) NOT NULL,
                estatus INTEGER DEFAULT 1 NOT NULL,
                CONSTRAINT id_subtipo_fianza PRIMARY KEY (id_subtipo_fianza)
);


ALTER SEQUENCE public.subtipo_fianza_id_subtipo_fianza_seq OWNED BY public.subtipo_fianza.id_subtipo_fianza;

CREATE SEQUENCE public.comite_id_comite_seq;

CREATE TABLE public.comite (
                id_comite INTEGER NOT NULL DEFAULT nextval('public.comite_id_comite_seq'),
                fecha_comite DATE NOT NULL,
                CONSTRAINT id_comite PRIMARY KEY (id_comite)
);


ALTER SEQUENCE public.comite_id_comite_seq OWNED BY public.comite.id_comite;

CREATE SEQUENCE public.actividad_economica_id_actividad_economica_seq;

CREATE TABLE public.actividad_economica (
                id_actividad_economica INTEGER NOT NULL DEFAULT nextval('public.actividad_economica_id_actividad_economica_seq'),
                codigo VARCHAR NOT NULL,
                nombre VARCHAR(500) NOT NULL,
                codigo_padre VARCHAR NOT NULL,
                nivel INTEGER NOT NULL,
                estatus VARCHAR DEFAULT 1 NOT NULL,
                CONSTRAINT id_actividad_economica PRIMARY KEY (id_actividad_economica)
);


ALTER SEQUENCE public.actividad_economica_id_actividad_economica_seq OWNED BY public.actividad_economica.id_actividad_economica;

CREATE UNIQUE INDEX actividad_economica_codigo_ukey
 ON public.actividad_economica
 ( codigo );

CREATE SEQUENCE public.emprendimiento_id_emprendimiento_seq;

CREATE TABLE public.emprendimiento (
                id_emprendimiento INTEGER NOT NULL DEFAULT nextval('public.emprendimiento_id_emprendimiento_seq'),
                nombre VARCHAR(200) NOT NULL,
                estatus INTEGER DEFAULT 1 NOT NULL,
                CONSTRAINT id_emprendimiento PRIMARY KEY (id_emprendimiento)
);


ALTER SEQUENCE public.emprendimiento_id_emprendimiento_seq OWNED BY public.emprendimiento.id_emprendimiento;

CREATE SEQUENCE public.profesion_oficio_id_profesion_oficio_seq;

CREATE TABLE public.profesion_oficio (
                id_profesion_oficio INTEGER NOT NULL DEFAULT nextval('public.profesion_oficio_id_profesion_oficio_seq'),
                nombre VARCHAR(200) NOT NULL,
                estatus INTEGER DEFAULT 1 NOT NULL,
                CONSTRAINT id_profesion_oficio PRIMARY KEY (id_profesion_oficio)
);


ALTER SEQUENCE public.profesion_oficio_id_profesion_oficio_seq OWNED BY public.profesion_oficio.id_profesion_oficio;

CREATE SEQUENCE public.institucion_id_institucion_seq;

CREATE TABLE public.institucion (
                id_institucion INTEGER NOT NULL DEFAULT nextval('public.institucion_id_institucion_seq'),
                nombre VARCHAR(200) NOT NULL,
                estatus INTEGER DEFAULT 1 NOT NULL,
                CONSTRAINT id_institucion PRIMARY KEY (id_institucion)
);


ALTER SEQUENCE public.institucion_id_institucion_seq OWNED BY public.institucion.id_institucion;

CREATE UNIQUE INDEX institucion_nombre_ukey
 ON public.institucion
 ( nombre );

CREATE SEQUENCE public.tipo_socio_id_tipo_socio_seq;

CREATE TABLE public.tipo_socio (
                id_tipo_socio INTEGER NOT NULL DEFAULT nextval('public.tipo_socio_id_tipo_socio_seq'),
                nombre VARCHAR(200) NOT NULL,
                estatus INTEGER DEFAULT 1 NOT NULL,
                CONSTRAINT id_tipo_socio PRIMARY KEY (id_tipo_socio)
);


ALTER SEQUENCE public.tipo_socio_id_tipo_socio_seq OWNED BY public.tipo_socio.id_tipo_socio;

CREATE UNIQUE INDEX tipo_socio_nombre_ukey
 ON public.tipo_socio
 ( nombre );

CREATE SEQUENCE public.denominacion_socio_id_denominacion_socio_seq;

CREATE TABLE public.denominacion_socio (
                id_denominacion_socio INTEGER NOT NULL DEFAULT nextval('public.denominacion_socio_id_denominacion_socio_seq'),
                id_tipo_socio INTEGER NOT NULL,
                nombre VARCHAR(200) NOT NULL,
                estatus INTEGER DEFAULT 1 NOT NULL,
                CONSTRAINT id_denominacion_socio PRIMARY KEY (id_denominacion_socio)
);


ALTER SEQUENCE public.denominacion_socio_id_denominacion_socio_seq OWNED BY public.denominacion_socio.id_denominacion_socio;

CREATE INDEX denominacion_socio_nombre_ukey
 ON public.denominacion_socio
 ( nombre, id_tipo_socio );

CREATE SEQUENCE public.lista_requisito_socio_id_lista_requisito_socio_seq;

CREATE TABLE public.lista_requisito_socio (
                id_lista_requisito_socio INTEGER NOT NULL DEFAULT nextval('public.lista_requisito_socio_id_lista_requisito_socio_seq'),
                nombre VARCHAR(200) NOT NULL,
                CONSTRAINT id_lista_requisito_socio PRIMARY KEY (id_lista_requisito_socio)
);


ALTER SEQUENCE public.lista_requisito_socio_id_lista_requisito_socio_seq OWNED BY public.lista_requisito_socio.id_lista_requisito_socio;

CREATE SEQUENCE public.perfil_sistema_id_perfil_sistema_seq;

CREATE TABLE public.perfil_sistema (
                id_perfil_sistema INTEGER NOT NULL DEFAULT nextval('public.perfil_sistema_id_perfil_sistema_seq'),
                nombre VARCHAR(50) NOT NULL,
                estatus INTEGER DEFAULT 1 NOT NULL,
                CONSTRAINT perfil_sistema_pkey PRIMARY KEY (id_perfil_sistema)
);


ALTER SEQUENCE public.perfil_sistema_id_perfil_sistema_seq OWNED BY public.perfil_sistema.id_perfil_sistema;

CREATE SEQUENCE public.menu_sistema_id_menu_sistema_seq;

CREATE TABLE public.menu_sistema (
                id_menu_sistema INTEGER NOT NULL DEFAULT nextval('public.menu_sistema_id_menu_sistema_seq'),
                nombre VARCHAR(50) NOT NULL,
                ruta VARCHAR(200) NOT NULL,
                padre INTEGER,
                nivel INTEGER,
                style VARCHAR(200),
                estatus INTEGER DEFAULT 1 NOT NULL,
                CONSTRAINT menu_sistema_pkey PRIMARY KEY (id_menu_sistema)
);


ALTER SEQUENCE public.menu_sistema_id_menu_sistema_seq OWNED BY public.menu_sistema.id_menu_sistema;

CREATE TABLE public.perfil_menu (
                id_perfil_sistema INTEGER NOT NULL,
                id_menu_sistema INTEGER NOT NULL,
                crear INTEGER DEFAULT 0 NOT NULL,
                modificar INTEGER DEFAULT 0 NOT NULL,
                consultar INTEGER DEFAULT 0 NOT NULL,
                eliminar INTEGER DEFAULT 0 NOT NULL,
                imprimir INTEGER DEFAULT 0 NOT NULL,
                CONSTRAINT perfil_menu_pkey PRIMARY KEY (id_perfil_sistema, id_menu_sistema)
);


CREATE SEQUENCE public.estado_id_estado_seq;

CREATE TABLE public.estado (
                id_estado INTEGER NOT NULL DEFAULT nextval('public.estado_id_estado_seq'),
                nombre VARCHAR(100) NOT NULL,
                estatus INTEGER DEFAULT 1 NOT NULL,
                CONSTRAINT id_estado PRIMARY KEY (id_estado)
);


ALTER SEQUENCE public.estado_id_estado_seq OWNED BY public.estado.id_estado;

CREATE SEQUENCE public.municipio_id_municipio_seq;

CREATE TABLE public.municipio (
                id_municipio INTEGER NOT NULL DEFAULT nextval('public.municipio_id_municipio_seq'),
                id_estado INTEGER NOT NULL,
                nombre VARCHAR(100) NOT NULL,
                estatus INTEGER DEFAULT 1 NOT NULL,
                CONSTRAINT id_municipio PRIMARY KEY (id_municipio)
);


ALTER SEQUENCE public.municipio_id_municipio_seq OWNED BY public.municipio.id_municipio;

CREATE SEQUENCE public.parroquia_id_parroquia_seq;

CREATE TABLE public.parroquia (
                id_parroquia INTEGER NOT NULL DEFAULT nextval('public.parroquia_id_parroquia_seq'),
                id_municipio INTEGER NOT NULL,
                nombre VARCHAR(100) NOT NULL,
                estatus INTEGER DEFAULT 1 NOT NULL,
                CONSTRAINT id_parroquia PRIMARY KEY (id_parroquia)
);


ALTER SEQUENCE public.parroquia_id_parroquia_seq OWNED BY public.parroquia.id_parroquia;

CREATE SEQUENCE public.tipo_sociedad_id_tipo_sociedad_seq;

CREATE TABLE public.tipo_sociedad (
                id_tipo_sociedad INTEGER NOT NULL DEFAULT nextval('public.tipo_sociedad_id_tipo_sociedad_seq'),
                nombre VARCHAR(200) NOT NULL,
                estatus INTEGER DEFAULT 1 NOT NULL,
                id_estado INTEGER NOT NULL,
                id_municipio INTEGER NOT NULL,
                id_parroquia INTEGER NOT NULL,
                direccion VARCHAR(200) NOT NULL,
                CONSTRAINT id_tipo_sociedad PRIMARY KEY (id_tipo_sociedad)
);


ALTER SEQUENCE public.tipo_sociedad_id_tipo_sociedad_seq OWNED BY public.tipo_sociedad.id_tipo_sociedad;

CREATE SEQUENCE public.evento_id_evento_seq;

CREATE TABLE public.evento (
                id_evento INTEGER NOT NULL DEFAULT nextval('public.evento_id_evento_seq'),
                nombre VARCHAR(200) NOT NULL,
                programa VARCHAR(200) NOT NULL,
                fecha_evento DATE NOT NULL,
                hora_inicio TIME NOT NULL,
                hora_fin TIME NOT NULL,
                id_estado INTEGER NOT NULL,
                id_municipio INTEGER NOT NULL,
                id_parroquia INTEGER NOT NULL,
                direccion VARCHAR(200) NOT NULL,
                tipo_actividad VARCHAR(3) NOT NULL,
                estatus INTEGER DEFAULT 1 NOT NULL,
                CONSTRAINT id_evento PRIMARY KEY (id_evento)
);


ALTER SEQUENCE public.evento_id_evento_seq OWNED BY public.evento.id_evento;

CREATE SEQUENCE public.representante_id_representante_seq;

CREATE TABLE public.representante (
                id_representante INTEGER NOT NULL DEFAULT nextval('public.representante_id_representante_seq'),
                cedula VARCHAR(15) NOT NULL,
                apellido VARCHAR(200) NOT NULL,
                nombre VARCHAR(100) NOT NULL,
                estado_civil VARCHAR(1) NOT NULL,
                id_estado INTEGER NOT NULL,
                id_municipio INTEGER NOT NULL,
                id_parroquia INTEGER NOT NULL,
                correo_electronico VARCHAR(200),
                CONSTRAINT id_represtante PRIMARY KEY (id_representante)
);


ALTER SEQUENCE public.representante_id_representante_seq OWNED BY public.representante.id_representante;

CREATE UNIQUE INDEX representante_cedula_ukey
 ON public.representante
 ( cedula );

CREATE UNIQUE INDEX representante_correo_electronico_key
 ON public.representante
 ( correo_electronico );

CREATE SEQUENCE public.representante_telefono_id_representante_telefono_seq;

CREATE TABLE public.representante_telefono (
                id_representante_telefono INTEGER NOT NULL DEFAULT nextval('public.representante_telefono_id_representante_telefono_seq'),
                numero VARCHAR(15) NOT NULL,
                id_representante INTEGER NOT NULL,
                estatus INTEGER DEFAULT 1 NOT NULL,
                CONSTRAINT id_representante_telefono PRIMARY KEY (id_representante_telefono)
);


ALTER SEQUENCE public.representante_telefono_id_representante_telefono_seq OWNED BY public.representante_telefono.id_representante_telefono;

CREATE UNIQUE INDEX representante_telefono_numero_ukey
 ON public.representante_telefono
 ( numero );

CREATE SEQUENCE public.sector_economico_id_sector_economico_seq;

CREATE TABLE public.sector_economico (
                id_sector_economico INTEGER NOT NULL DEFAULT nextval('public.sector_economico_id_sector_economico_seq'),
                nombre VARCHAR(200) NOT NULL,
                estatus INTEGER DEFAULT 1 NOT NULL,
                CONSTRAINT id_sector_economico PRIMARY KEY (id_sector_economico)
);


ALTER SEQUENCE public.sector_economico_id_sector_economico_seq OWNED BY public.sector_economico.id_sector_economico;

CREATE INDEX sector_economico_nombre_ukey
 ON public.sector_economico
 ( nombre );

CREATE SEQUENCE public.participante_id_participante_seq;

CREATE TABLE public.participante (
                id_participante INTEGER NOT NULL DEFAULT nextval('public.participante_id_participante_seq'),
                tipo_persona VARCHAR(1) NOT NULL,
                cedula VARCHAR(15),
                apellido VARCHAR(200),
                nombre VARCHAR(200),
                estado_civil VARCHAR(1),
                fecha_nacimiento DATE,
                sexo VARCHAR(1),
                nivel_educativo VARCHAR(2),
                id_profesion_oficio INTEGER,
                carga_familiar INTEGER,
                rif VARCHAR(11),
                razon_social VARCHAR(200),
                fecha_constitucion DATE,
                empleos_directos INTEGER,
                empleos_indirectos INTEGER,
                objeto_social VARCHAR(200),
                base_organizacion INTEGER NOT NULL,
                base_tipo VARCHAR(3),
                base_especifique VARCHAR(3),
                productiva_organizacion INTEGER NOT NULL,
                productiva_tipo VARCHAR(3),
                productiva_especifique VARCHAR(200),
                dispuesto_redes VARCHAR(1) NOT NULL,
                telefono VARCHAR(15) NOT NULL,
                direccion_tipo VARCHAR(3) NOT NULL,
                id_estado INTEGER NOT NULL,
                id_municipio INTEGER NOT NULL,
                id_parroquia INTEGER NOT NULL,
                direccion VARCHAR(200) NOT NULL,
                id_sector_economico INTEGER NOT NULL,
                id_actividad_economica INTEGER NOT NULL,
                id_actividad_economica_1 INTEGER NOT NULL,
                id_actividad_economica_2 INTEGER NOT NULL,
                id_actividad_economica_3 INTEGER NOT NULL,
                actividad_especifica VARCHAR(200) NOT NULL,
                fecha_inicio DATE NOT NULL,
                fecha_sitio DATE NOT NULL,
                inicio_oficio VARCHAR(3) NOT NULL,
                id_emprendimiento INTEGER NOT NULL,
                terreno_disponibilidad INTEGER,
                terreno_tenencia VARCHAR(3),
                terreno_vocacion VARCHAR(3),
                terreno_rubros VARCHAR(200),
                terreno_sello INTEGER,
                terreno_beneficio INTEGER,
                terreno_guia INTEGER,
                terreno_hidrico INTEGER,
                terreno_permisos INTEGER,
                manu_certificado INTEGER,
                manu_numero VARCHAR(200),
                manu_rnee INTEGER,
                manu_constancia INTEGER,
                manu_textil INTEGER,
                manu_nac INTEGER,
                manu_uso INTEGER,
                manu_industrializadora INTEGER,
                turismo_registro INTEGER,
                turismo_numero VARCHAR(200),
                turismo_sanidad INTEGER,
                estatus_actividad INTEGER NOT NULL,
                procedencia_ingreso VARCHAR(3) NOT NULL,
                activo_actividad INTEGER DEFAULT 0 NOT NULL,
                activo1 VARCHAR(3),
                activo2 VARCHAR(3),
                activo3 VARCHAR(3),
                programa_especial INTEGER DEFAULT 0 NOT NULL,
                programa_explique VARCHAR(3),
                ciclo_produccion INTEGER NOT NULL,
                ciclo_logistica INTEGER NOT NULL,
                ciclo_distribucion INTEGER NOT NULL,
                ciclo_comercializacion INTEGER NOT NULL,
                planificacion_planificacion INTEGER NOT NULL,
                planificacion_calidad INTEGER NOT NULL,
                planificacion_formulacion INTEGER NOT NULL,
                planificacion_diversificacion INTEGER NOT NULL,
                comunitaria_comunitadad INTEGER NOT NULL,
                comunitaria_consejo INTEGER NOT NULL,
                ambiente_manejo INTEGER NOT NULL,
                ambiente_sustentable INTEGER NOT NULL,
                tiempo_disponible INTEGER DEFAULT 0 NOT NULL,
                horario_sugerido VARCHAR(3),
                lugar_sugerido VARCHAR(200),
                financiamento_productivo INTEGER DEFAULT 0 NOT NULL,
                financiamiento_explique VARCHAR(200),
                bancarizado INTEGER DEFAULT 0 NOT NULL,
                bancarizado_tipo VARCHAR(3),
                crediticia_experiencia INTEGER DEFAULT 0,
                crediticia_especificacion VARCHAR(200),
                observacion TEXT NOT NULL,
                CONSTRAINT id_participante PRIMARY KEY (id_participante)
);


ALTER SEQUENCE public.participante_id_participante_seq OWNED BY public.participante.id_participante;

CREATE SEQUENCE public.participante_contacto_id_participante_contacto_seq;

CREATE TABLE public.participante_contacto (
                id_participante_contacto INTEGER NOT NULL DEFAULT nextval('public.participante_contacto_id_participante_contacto_seq'),
                id_participante INTEGER NOT NULL,
                tipo VARCHAR(3) NOT NULL,
                nombre VARCHAR(200) NOT NULL,
                estatus INTEGER DEFAULT 1 NOT NULL,
                CONSTRAINT id_participante_contacto PRIMARY KEY (id_participante_contacto)
);


ALTER SEQUENCE public.participante_contacto_id_participante_contacto_seq OWNED BY public.participante_contacto.id_participante_contacto;

CREATE SEQUENCE public.participante_direccion_id_participante_direccion_seq;

CREATE TABLE public.participante_direccion (
                id_participante_direccion INTEGER NOT NULL DEFAULT nextval('public.participante_direccion_id_participante_direccion_seq'),
                direccion_tipo VARCHAR(3) NOT NULL,
                id_participante INTEGER NOT NULL,
                id_estado INTEGER NOT NULL,
                id_municipio INTEGER NOT NULL,
                id_parroquia INTEGER NOT NULL,
                direccion VARCHAR(200) NOT NULL,
                estatus INTEGER DEFAULT 1 NOT NULL,
                CONSTRAINT id_participante_direccion PRIMARY KEY (id_participante_direccion)
);


ALTER SEQUENCE public.participante_direccion_id_participante_direccion_seq OWNED BY public.participante_direccion.id_participante_direccion;

CREATE TABLE public.participante_representante (
                id_participante INTEGER NOT NULL,
                id_representante INTEGER NOT NULL,
                CONSTRAINT id_participante_representante PRIMARY KEY (id_participante, id_representante)
);


CREATE TABLE public.evento_participante (
                id_participante INTEGER NOT NULL,
                id_evento INTEGER NOT NULL,
                CONSTRAINT id_evento_participante PRIMARY KEY (id_participante, id_evento)
);


CREATE SEQUENCE public.participante_telefono_id_participante_telefono_seq;

CREATE TABLE public.participante_telefono (
                id_participante_telefono INTEGER NOT NULL DEFAULT nextval('public.participante_telefono_id_participante_telefono_seq'),
                id_participante INTEGER NOT NULL,
                tipo_numero VARCHAR(3) NOT NULL,
                numero VARCHAR(15) NOT NULL,
                estatus INTEGER DEFAULT 1 NOT NULL,
                CONSTRAINT id_participante_telefono PRIMARY KEY (id_participante_telefono)
);


ALTER SEQUENCE public.participante_telefono_id_participante_telefono_seq OWNED BY public.participante_telefono.id_participante_telefono;

CREATE SEQUENCE public.sociedad_id_sociedad_seq;

CREATE TABLE public.sociedad (
                id_sociedad INTEGER NOT NULL DEFAULT nextval('public.sociedad_id_sociedad_seq'),
                rif VARCHAR(11) NOT NULL,
                nombre VARCHAR(200) NOT NULL,
                estatus INTEGER DEFAULT 1 NOT NULL,
                id_tipo_sociedad INTEGER NOT NULL,
                fecha_operaciones DATE NOT NULL,
                fecha_autorizacion DATE NOT NULL,
                cobertura VARCHAR(200) NOT NULL,
                objeto VARCHAR(200) NOT NULL,
                otros_datos VARCHAR(200) NOT NULL,
                capital_autorizado NUMERIC(100,2) NOT NULL,
                patrimonio NUMERIC(100,2) NOT NULL,
                autoreafianza INTEGER NOT NULL,
                max_riesgo_socio NUMERIC(4,2) NOT NULL,
                porcen_riesgo NUMERIC(4,2) NOT NULL,
                porcen_operativo NUMERIC(4,2) NOT NULL,
                max_ind_afianciamiento NUMERIC(5,2) NOT NULL,
                reserva_riesgo NUMERIC(100,2) NOT NULL,
                CONSTRAINT id_sociedad PRIMARY KEY (id_sociedad)
);


ALTER SEQUENCE public.sociedad_id_sociedad_seq OWNED BY public.sociedad.id_sociedad;

CREATE SEQUENCE public.participantes_fianza_id_participantes_fianza_seq;

CREATE TABLE public.participantes_fianza (
                id_participantes_fianza INTEGER NOT NULL DEFAULT nextval('public.participantes_fianza_id_participantes_fianza_seq'),
                id_sociedad INTEGER NOT NULL,
                porcentaje_aportado NUMERIC(100,2) NOT NULL,
                monto_aportado NUMERIC(100,2) NOT NULL,
                porcentaje_comision NUMERIC(100,2) NOT NULL,
                monto_comision NUMERIC(100,2) NOT NULL,
                CONSTRAINT id_participantes_fianza PRIMARY KEY (id_participantes_fianza)
);


ALTER SEQUENCE public.participantes_fianza_id_participantes_fianza_seq OWNED BY public.participantes_fianza.id_participantes_fianza;

CREATE TABLE public.sociedad_representante (
                id_sociedad INTEGER NOT NULL,
                id_representante INTEGER NOT NULL,
                CONSTRAINT id_sociedad_representante PRIMARY KEY (id_sociedad, id_representante)
);


CREATE SEQUENCE public.usuario_sistema_id_usuario_sistema_seq;

CREATE TABLE public.usuario_sistema (
                id_usuario_sistema INTEGER NOT NULL DEFAULT nextval('public.usuario_sistema_id_usuario_sistema_seq'),
                cedula VARCHAR(15) NOT NULL,
                usuario VARCHAR(50) NOT NULL,
                primer_nombre VARCHAR(20) NOT NULL,
                segundo_nombre VARCHAR(20),
                primer_apellido VARCHAR(20) NOT NULL,
                segundo_apellido VARCHAR(20),
                fecha_nacimiento DATE,
                sexo VARCHAR(1) NOT NULL,
                observacion_personal VARCHAR(200),
                contrasena VARCHAR(200) NOT NULL,
                fecha_registro DATE NOT NULL,
                estatus INTEGER DEFAULT 1 NOT NULL,
                estatus_contrasena INTEGER DEFAULT 1 NOT NULL,
                id_perfil_sistema INTEGER,
                direccion_ip VARCHAR(20) NOT NULL,
                id_registrador INTEGER NOT NULL,
                id_sociedad INTEGER,
                CONSTRAINT usuario_sistema_pkey PRIMARY KEY (id_usuario_sistema)
);


ALTER SEQUENCE public.usuario_sistema_id_usuario_sistema_seq OWNED BY public.usuario_sistema.id_usuario_sistema;

CREATE UNIQUE INDEX usuario_sistema_cedula_ukey
 ON public.usuario_sistema
 ( cedula );

CREATE UNIQUE INDEX usuario_sistema_usuario_ukey
 ON public.usuario_sistema
 ( usuario );

CREATE SEQUENCE public.comite_usuario_id_comite_usuario_seq;

CREATE TABLE public.comite_usuario (
                id_comite_usuario INTEGER NOT NULL DEFAULT nextval('public.comite_usuario_id_comite_usuario_seq'),
                id_comite INTEGER NOT NULL,
                id_usuario_sistema INTEGER NOT NULL,
                CONSTRAINT id_comite_usuario PRIMARY KEY (id_comite_usuario)
);


ALTER SEQUENCE public.comite_usuario_id_comite_usuario_seq OWNED BY public.comite_usuario.id_comite_usuario;

CREATE SEQUENCE public.socio_id_socio_seq;

CREATE TABLE public.socio (
                id_socio INTEGER NOT NULL DEFAULT nextval('public.socio_id_socio_seq'),
                fecha_solicitud DATE NOT NULL,
                id_tipo_socio INTEGER NOT NULL,
                id_denominacion_socio INTEGER NOT NULL,
                rif VARCHAR(11) NOT NULL,
                nombre VARCHAR(200) NOT NULL,
                id_estado INTEGER NOT NULL,
                id_municipio INTEGER NOT NULL,
                id_parroquia INTEGER NOT NULL,
                direccion VARCHAR(200) NOT NULL,
                fecha_registro DATE NOT NULL,
                fecha_venc_adm DATE NOT NULL,
                id_institucion INTEGER NOT NULL,
                direccion_registro VARCHAR(200) NOT NULL,
                objeto VARCHAR(200) NOT NULL,
                experiencia VARCHAR(200) NOT NULL,
                observaciones VARCHAR(200) NOT NULL,
                id_sector_economico INTEGER NOT NULL,
                id_actividad_economica INTEGER NOT NULL,
                mano_obra_directa INTEGER NOT NULL,
                mano_obra_indirecta INTEGER NOT NULL,
                patrimonio NUMERIC(200,2) NOT NULL,
                venta_neta_anual NUMERIC(200,2) NOT NULL,
                numero_contratista INTEGER NOT NULL,
                acciones NUMERIC(100,2) NOT NULL,
                monto_acciones_d NUMERIC(100,2) NOT NULL,
                correo_electronico VARCHAR(200) NOT NULL,
                contrasena VARCHAR(200) NOT NULL,
                estatus INTEGER DEFAULT 1 NOT NULL,
                CONSTRAINT id_socio PRIMARY KEY (id_socio)
);


ALTER SEQUENCE public.socio_id_socio_seq OWNED BY public.socio.id_socio;

CREATE UNIQUE INDEX socio_rif_ukey
 ON public.socio
 ( rif );

CREATE INDEX socio_correo_electronico_ukey
 ON public.socio
 ( correo_electronico );

CREATE TABLE public.comite_socio (
                id_socio INTEGER NOT NULL,
                id_comite INTEGER NOT NULL,
                id_comite_usuario INTEGER NOT NULL,
                CONSTRAINT id_comite_socio PRIMARY KEY (id_socio, id_comite)
);


CREATE SEQUENCE public.socio_telefono_id_socio_telefono_seq;

CREATE TABLE public.socio_telefono (
                id_socio_telefono INTEGER NOT NULL DEFAULT nextval('public.socio_telefono_id_socio_telefono_seq'),
                numero VARCHAR(15) NOT NULL,
                id_socio INTEGER NOT NULL,
                estatus INTEGER DEFAULT 1 NOT NULL,
                CONSTRAINT id_socio_telefono PRIMARY KEY (id_socio_telefono)
);


ALTER SEQUENCE public.socio_telefono_id_socio_telefono_seq OWNED BY public.socio_telefono.id_socio_telefono;

CREATE UNIQUE INDEX telefono_numero_ukey
 ON public.socio_telefono
 ( numero );

CREATE TABLE public.socio_representante (
                id_representante INTEGER NOT NULL,
                id_socio INTEGER NOT NULL,
                CONSTRAINT id_socio_representante PRIMARY KEY (id_representante, id_socio)
);


CREATE SEQUENCE public.requisito_socio_id_requisito_socio_seq;

CREATE TABLE public.requisito_socio (
                id_requisito_socio INTEGER NOT NULL DEFAULT nextval('public.requisito_socio_id_requisito_socio_seq'),
                id_socio INTEGER NOT NULL,
                id_lista_requisito_socio INTEGER NOT NULL,
                estatu_requisito VARCHAR NOT NULL,
                CONSTRAINT id_requisito_socio PRIMARY KEY (id_requisito_socio)
);


ALTER SEQUENCE public.requisito_socio_id_requisito_socio_seq OWNED BY public.requisito_socio.id_requisito_socio;

CREATE SEQUENCE public.documento_socio_id_documento_socio_seq;

CREATE TABLE public.documento_socio (
                id_documento_socio INTEGER NOT NULL DEFAULT nextval('public.documento_socio_id_documento_socio_seq'),
                id_socio INTEGER NOT NULL,
                ruta VARCHAR(200) NOT NULL,
                tipo VARCHAR NOT NULL,
                estatus INTEGER DEFAULT 1 NOT NULL,
                CONSTRAINT id_documento_socio PRIMARY KEY (id_documento_socio)
);


ALTER SEQUENCE public.documento_socio_id_documento_socio_seq OWNED BY public.documento_socio.id_documento_socio;

CREATE TABLE public.socio_sociedad (
                id_socio INTEGER NOT NULL,
                id_sociedad INTEGER NOT NULL,
                estatus INTEGER DEFAULT 1 NOT NULL,
                acciones_d NUMERIC(100,2) NOT NULL,
                monto_acciones_d NUMERIC(100,2) NOT NULL,
                id_estado INTEGER NOT NULL,
                id_municipio INTEGER NOT NULL,
                id_parroquia INTEGER NOT NULL,
                direccion VARCHAR(200) NOT NULL,
                CONSTRAINT id_socio_sociedad PRIMARY KEY (id_socio, id_sociedad)
);


CREATE SEQUENCE public.afianzamiento_id_afianzamiento_seq;

CREATE TABLE public.afianzamiento (
                id_afianzamiento INTEGER NOT NULL DEFAULT nextval('public.afianzamiento_id_afianzamiento_seq'),
                id_socio INTEGER NOT NULL,
                id_sociedad INTEGER NOT NULL,
                fecha_solicitud DATE NOT NULL,
                n_fianza VARCHAR(6) NOT NULL,
                id_subtipo_fianza INTEGER NOT NULL,
                id_modalidad INTEGER NOT NULL,
                objetivo TEXT NOT NULL,
                justificación TEXT NOT NULL,
                id_sector_economico INTEGER NOT NULL,
                rubro VARCHAR(50) NOT NULL,
                mano_obra_directa INTEGER NOT NULL,
                mano_obra_indirecta INTEGER NOT NULL,
                otro INTEGER NOT NULL,
                id_tipo_ingreso_fianza INTEGER NOT NULL,
                monto_proyectado NUMERIC(100,2) NOT NULL,
                porcentaje_afianzar NUMERIC(100,2) NOT NULL,
                monto_fianza NUMERIC(100,2) NOT NULL,
                porcentaje_comision NUMERIC(100,2) NOT NULL,
                monto_comision NUMERIC(100,2) NOT NULL,
                id_tipo_pago_comision INTEGER NOT NULL,
                id_forma_afianzamiento INTEGER NOT NULL,
                fecha_inicio DATE NOT NULL,
                fecha_renovacion DATE NOT NULL,
                fecha_culminacion DATE NOT NULL,
                id_financiera_finanza INTEGER NOT NULL,
                observacion TEXT NOT NULL,
                numero_pacticipante INTEGER NOT NULL,
                id_participantes_fianza INTEGER NOT NULL,
                id_indicador_riesgo INTEGER NOT NULL,
                id_usuario_registra INTEGER NOT NULL,
                fecha_registro TIMESTAMP NOT NULL,
                ip_registro VARCHAR(15) NOT NULL,
                id_usuario_modifica INTEGER NOT NULL,
                fecha_modificacion TIMESTAMP NOT NULL,
                ip_modificacion VARCHAR(15) NOT NULL,
                CONSTRAINT id_afianzamiento PRIMARY KEY (id_afianzamiento)
);


ALTER SEQUENCE public.afianzamiento_id_afianzamiento_seq OWNED BY public.afianzamiento.id_afianzamiento;

CREATE TABLE public.comite_afianzamiento (
                id_afianzamiento INTEGER NOT NULL,
                id_comite INTEGER NOT NULL,
                id_comite_usuario INTEGER NOT NULL,
                CONSTRAINT id_comite_afianzamiento PRIMARY KEY (id_afianzamiento, id_comite)
);


ALTER TABLE public.financiera_finanza ADD CONSTRAINT financiera_financiera_finanza_fk
FOREIGN KEY (id_entidad_financiera)
REFERENCES public.entidad_financiera (id_entidad_financiera)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.afianzamiento ADD CONSTRAINT financiera_finanza_afianzamiento_fk
FOREIGN KEY (id_financiera_finanza)
REFERENCES public.financiera_finanza (id_financiera_finanza)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.afianzamiento ADD CONSTRAINT indicador_riesgo_afianzamiento_fk
FOREIGN KEY (id_indicador_riesgo)
REFERENCES public.indicador_riesgo (id_indicador_riesgo)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.afianzamiento ADD CONSTRAINT forma_afianzamiento_afianzamiento_fk
FOREIGN KEY (id_forma_afianzamiento)
REFERENCES public.forma_afianzamiento (id_forma_afianzamiento)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.afianzamiento ADD CONSTRAINT tipo_pago_comision_afianzamiento_fk
FOREIGN KEY (id_tipo_pago_comision)
REFERENCES public.tipo_pago_comision (id_tipo_pago_comision)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.afianzamiento ADD CONSTRAINT tipo_ingreso_fianza_afianzamiento_fk
FOREIGN KEY (id_tipo_ingreso_fianza)
REFERENCES public.tipo_ingreso_fianza (id_tipo_ingreso_fianza)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.afianzamiento ADD CONSTRAINT modalidad_fianza_afianzamiento_fk
FOREIGN KEY (id_modalidad)
REFERENCES public.modalidad_fianza (id_modalidad)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.subtipo_fianza ADD CONSTRAINT tipo_fianza_subtipo_fianza_fk
FOREIGN KEY (id_tipo_fianza)
REFERENCES public.tipo_fianza (id_tipo_fianza)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.afianzamiento ADD CONSTRAINT subtipo_fianza_afianzamiento_fk
FOREIGN KEY (id_subtipo_fianza)
REFERENCES public.subtipo_fianza (id_subtipo_fianza)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.comite_socio ADD CONSTRAINT comite_comite_socio_fk
FOREIGN KEY (id_comite)
REFERENCES public.comite (id_comite)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.comite_usuario ADD CONSTRAINT comite_comite_usuario_fk
FOREIGN KEY (id_comite)
REFERENCES public.comite (id_comite)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.comite_afianzamiento ADD CONSTRAINT comite_comite_afianzamiento_fk
FOREIGN KEY (id_comite)
REFERENCES public.comite (id_comite)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.socio ADD CONSTRAINT actividad_economica_socio_fk
FOREIGN KEY (id_actividad_economica)
REFERENCES public.actividad_economica (id_actividad_economica)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.participante ADD CONSTRAINT actividad_economica_participante_fk
FOREIGN KEY (id_actividad_economica)
REFERENCES public.actividad_economica (id_actividad_economica)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.participante ADD CONSTRAINT actividad_economica_participante_fk1
FOREIGN KEY (id_actividad_economica_1)
REFERENCES public.actividad_economica (id_actividad_economica)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.participante ADD CONSTRAINT actividad_economica_participante_fk2
FOREIGN KEY (id_actividad_economica_2)
REFERENCES public.actividad_economica (id_actividad_economica)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.participante ADD CONSTRAINT actividad_economica_participante_fk3
FOREIGN KEY (id_actividad_economica_3)
REFERENCES public.actividad_economica (id_actividad_economica)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.participante ADD CONSTRAINT emprendimiento_participante_fk
FOREIGN KEY (id_emprendimiento)
REFERENCES public.emprendimiento (id_emprendimiento)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.participante ADD CONSTRAINT profesion_oficio_participante_fk
FOREIGN KEY (id_profesion_oficio)
REFERENCES public.profesion_oficio (id_profesion_oficio)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.socio ADD CONSTRAINT institucion_socio_fk
FOREIGN KEY (id_institucion)
REFERENCES public.institucion (id_institucion)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.socio ADD CONSTRAINT tipo_socio_socio_fk
FOREIGN KEY (id_tipo_socio)
REFERENCES public.tipo_socio (id_tipo_socio)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.denominacion_socio ADD CONSTRAINT tipo_socio_denominacion_socio_fk
FOREIGN KEY (id_tipo_socio)
REFERENCES public.tipo_socio (id_tipo_socio)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.socio ADD CONSTRAINT denominacion_socio_socio_fk
FOREIGN KEY (id_denominacion_socio)
REFERENCES public.denominacion_socio (id_denominacion_socio)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.requisito_socio ADD CONSTRAINT lista_requisito_socio_requisito_socio_fk
FOREIGN KEY (id_lista_requisito_socio)
REFERENCES public.lista_requisito_socio (id_lista_requisito_socio)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.perfil_menu ADD CONSTRAINT perfil_menu_id_perfil_sistema_fkey
FOREIGN KEY (id_perfil_sistema)
REFERENCES public.perfil_sistema (id_perfil_sistema)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.usuario_sistema ADD CONSTRAINT usuario_sistema_id_perfil_sistema_fkey
FOREIGN KEY (id_perfil_sistema)
REFERENCES public.perfil_sistema (id_perfil_sistema)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.perfil_menu ADD CONSTRAINT perfil_menu_id_menu_sistema_fkey
FOREIGN KEY (id_menu_sistema)
REFERENCES public.menu_sistema (id_menu_sistema)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.socio ADD CONSTRAINT estado_socio_fk
FOREIGN KEY (id_estado)
REFERENCES public.estado (id_estado)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.municipio ADD CONSTRAINT estado_municipio_fk
FOREIGN KEY (id_estado)
REFERENCES public.estado (id_estado)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.representante ADD CONSTRAINT estado_representante_fk
FOREIGN KEY (id_estado)
REFERENCES public.estado (id_estado)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.evento ADD CONSTRAINT estado_evento_fk
FOREIGN KEY (id_estado)
REFERENCES public.estado (id_estado)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.participante ADD CONSTRAINT estado_participante_fk
FOREIGN KEY (id_estado)
REFERENCES public.estado (id_estado)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.participante_direccion ADD CONSTRAINT estado_participante_direccion_fk
FOREIGN KEY (id_estado)
REFERENCES public.estado (id_estado)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.socio_sociedad ADD CONSTRAINT estado_socio_sociedad_fk
FOREIGN KEY (id_estado)
REFERENCES public.estado (id_estado)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.tipo_sociedad ADD CONSTRAINT estado_tipo_sociedad_fk
FOREIGN KEY (id_estado)
REFERENCES public.estado (id_estado)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.socio ADD CONSTRAINT municipio_socio_fk
FOREIGN KEY (id_municipio)
REFERENCES public.municipio (id_municipio)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.parroquia ADD CONSTRAINT municipio_parroquia_fk
FOREIGN KEY (id_municipio)
REFERENCES public.municipio (id_municipio)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.representante ADD CONSTRAINT municipio_representante_fk
FOREIGN KEY (id_municipio)
REFERENCES public.municipio (id_municipio)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.evento ADD CONSTRAINT municipio_evento_fk
FOREIGN KEY (id_municipio)
REFERENCES public.municipio (id_municipio)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.participante ADD CONSTRAINT municipio_participante_fk
FOREIGN KEY (id_municipio)
REFERENCES public.municipio (id_municipio)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.participante_direccion ADD CONSTRAINT municipio_participante_direccion_fk
FOREIGN KEY (id_municipio)
REFERENCES public.municipio (id_municipio)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.socio_sociedad ADD CONSTRAINT municipio_socio_sociedad_fk
FOREIGN KEY (id_municipio)
REFERENCES public.municipio (id_municipio)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.tipo_sociedad ADD CONSTRAINT municipio_tipo_sociedad_fk
FOREIGN KEY (id_municipio)
REFERENCES public.municipio (id_municipio)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.socio ADD CONSTRAINT parroquia_socio_fk
FOREIGN KEY (id_parroquia)
REFERENCES public.parroquia (id_parroquia)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.representante ADD CONSTRAINT parroquia_representante_fk
FOREIGN KEY (id_parroquia)
REFERENCES public.parroquia (id_parroquia)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.evento ADD CONSTRAINT parroquia_evento_fk
FOREIGN KEY (id_parroquia)
REFERENCES public.parroquia (id_parroquia)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.participante ADD CONSTRAINT parroquia_participante_fk
FOREIGN KEY (id_parroquia)
REFERENCES public.parroquia (id_parroquia)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.participante_direccion ADD CONSTRAINT parroquia_participante_direccion_fk
FOREIGN KEY (id_parroquia)
REFERENCES public.parroquia (id_parroquia)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.socio_sociedad ADD CONSTRAINT parroquia_socio_sociedad_fk
FOREIGN KEY (id_parroquia)
REFERENCES public.parroquia (id_parroquia)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.tipo_sociedad ADD CONSTRAINT parroquia_tipo_sociedad_fk
FOREIGN KEY (id_parroquia)
REFERENCES public.parroquia (id_parroquia)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.sociedad ADD CONSTRAINT tipo_sociedad_sociedad_fk
FOREIGN KEY (id_tipo_sociedad)
REFERENCES public.tipo_sociedad (id_tipo_sociedad)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.evento_participante ADD CONSTRAINT evento_evento_participante_fk
FOREIGN KEY (id_evento)
REFERENCES public.evento (id_evento)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.socio_representante ADD CONSTRAINT representante_socio_representante_fk
FOREIGN KEY (id_representante)
REFERENCES public.representante (id_representante)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.representante_telefono ADD CONSTRAINT representante_representante_telefono_fk
FOREIGN KEY (id_representante)
REFERENCES public.representante (id_representante)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.participante_representante ADD CONSTRAINT representante_participante_representante_fk
FOREIGN KEY (id_representante)
REFERENCES public.representante (id_representante)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.sociedad_representante ADD CONSTRAINT representante_sociedad_representante_fk
FOREIGN KEY (id_representante)
REFERENCES public.representante (id_representante)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.socio ADD CONSTRAINT sector_economico_socio_fk
FOREIGN KEY (id_sector_economico)
REFERENCES public.sector_economico (id_sector_economico)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.participante ADD CONSTRAINT sector_economico_participante_fk
FOREIGN KEY (id_sector_economico)
REFERENCES public.sector_economico (id_sector_economico)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.afianzamiento ADD CONSTRAINT sector_economico_afianzamiento_fk
FOREIGN KEY (id_sector_economico)
REFERENCES public.sector_economico (id_sector_economico)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.participante_telefono ADD CONSTRAINT participante_participante_telefono_fk
FOREIGN KEY (id_participante)
REFERENCES public.participante (id_participante)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.evento_participante ADD CONSTRAINT participante_evento_participante_fk
FOREIGN KEY (id_participante)
REFERENCES public.participante (id_participante)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.participante_representante ADD CONSTRAINT participante_participante_representante_fk
FOREIGN KEY (id_participante)
REFERENCES public.participante (id_participante)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.participante_direccion ADD CONSTRAINT participante_participante_direccion_fk
FOREIGN KEY (id_participante)
REFERENCES public.participante (id_participante)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.participante_contacto ADD CONSTRAINT participante_participante_contacto_fk
FOREIGN KEY (id_participante)
REFERENCES public.participante (id_participante)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.socio_sociedad ADD CONSTRAINT sociedad_socio_sociedad_fk
FOREIGN KEY (id_sociedad)
REFERENCES public.sociedad (id_sociedad)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.usuario_sistema ADD CONSTRAINT sociedad_usuario_sistema_fk
FOREIGN KEY (id_sociedad)
REFERENCES public.sociedad (id_sociedad)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.sociedad_representante ADD CONSTRAINT sociedad_sociedad_representante_fk
FOREIGN KEY (id_sociedad)
REFERENCES public.sociedad (id_sociedad)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.participantes_fianza ADD CONSTRAINT sociedad_participantes_fianza_fk
FOREIGN KEY (id_sociedad)
REFERENCES public.sociedad (id_sociedad)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.afianzamiento ADD CONSTRAINT participantes_fianza_afianzamiento_fk
FOREIGN KEY (id_participantes_fianza)
REFERENCES public.participantes_fianza (id_participantes_fianza)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.comite_usuario ADD CONSTRAINT usuario_sistema_comite_usuario_fk
FOREIGN KEY (id_usuario_sistema)
REFERENCES public.usuario_sistema (id_usuario_sistema)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.afianzamiento ADD CONSTRAINT usuario_sistema_afianzamiento_fk
FOREIGN KEY (id_usuario_registra)
REFERENCES public.usuario_sistema (id_usuario_sistema)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.afianzamiento ADD CONSTRAINT usuario_sistema_afianzamiento_fk1
FOREIGN KEY (id_usuario_modifica)
REFERENCES public.usuario_sistema (id_usuario_sistema)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.comite_afianzamiento ADD CONSTRAINT comite_usuario_comite_afianzamiento_fk
FOREIGN KEY (id_comite_usuario)
REFERENCES public.comite_usuario (id_comite_usuario)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.comite_socio ADD CONSTRAINT comite_usuario_comite_socio_fk
FOREIGN KEY (id_comite_usuario)
REFERENCES public.comite_usuario (id_comite_usuario)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.socio_sociedad ADD CONSTRAINT socio_socio_sociedad_fk
FOREIGN KEY (id_socio)
REFERENCES public.socio (id_socio)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.documento_socio ADD CONSTRAINT socio_documento_socio_fk
FOREIGN KEY (id_socio)
REFERENCES public.socio (id_socio)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.requisito_socio ADD CONSTRAINT socio_requisito_socio_fk
FOREIGN KEY (id_socio)
REFERENCES public.socio (id_socio)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.socio_representante ADD CONSTRAINT socio_socio_representante_fk
FOREIGN KEY (id_socio)
REFERENCES public.socio (id_socio)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.socio_telefono ADD CONSTRAINT socio_telefono_fk
FOREIGN KEY (id_socio)
REFERENCES public.socio (id_socio)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.comite_socio ADD CONSTRAINT socio_comite_socio_fk
FOREIGN KEY (id_socio)
REFERENCES public.socio (id_socio)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.afianzamiento ADD CONSTRAINT socio_sociedad_afianzamiento_fk
FOREIGN KEY (id_socio, id_sociedad)
REFERENCES public.socio_sociedad (id_socio, id_sociedad)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.comite_afianzamiento ADD CONSTRAINT afianzamiento_comite_afianzamiento_fk
FOREIGN KEY (id_afianzamiento)
REFERENCES public.afianzamiento (id_afianzamiento)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;
