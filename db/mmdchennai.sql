PGDMP         '            	    {         
   mmdchennai    14.7    14.7 �    T           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            U           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            V           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            W           1262    43314 
   mmdchennai    DATABASE     n   CREATE DATABASE mmdchennai WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'English_United States.1252';
    DROP DATABASE mmdchennai;
                postgres    false            �            1259    43315    mmd_aboutus_about_id_seq    SEQUENCE     �   CREATE SEQUENCE public.mmd_aboutus_about_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public.mmd_aboutus_about_id_seq;
       public          postgres    false            �            1259    43316    mmd_aboutus    TABLE     �  CREATE TABLE public.mmd_aboutus (
    doc_id integer DEFAULT nextval('public.mmd_aboutus_about_id_seq'::regclass) NOT NULL,
    contents character varying(100000),
    page_id integer NOT NULL,
    uploaded_on timestamp with time zone,
    status character varying(10) DEFAULT 'L'::character varying,
    inserted_by character varying(50),
    updated_by character varying(50),
    updated_on timestamp with time zone
);
    DROP TABLE public.mmd_aboutus;
       public         heap    postgres    false    209            �            1259    43323    mmd_login_trial_seq    SEQUENCE     |   CREATE SEQUENCE public.mmd_login_trial_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.mmd_login_trial_seq;
       public          postgres    false            �            1259    43324    mmd_login_trial    TABLE     �  CREATE TABLE public.mmd_login_trial (
    trial_id integer DEFAULT nextval('public.mmd_login_trial_seq'::regclass) NOT NULL,
    admin_username character varying(50) DEFAULT NULL::character varying,
    ip_address character varying(50) DEFAULT NULL::character varying,
    browser_name character varying(50) DEFAULT NULL::character varying,
    status character varying(10) DEFAULT 'success'::character varying NOT NULL,
    user_id integer,
    login_time timestamp with time zone
);
 #   DROP TABLE public.mmd_login_trial;
       public         heap    postgres    false    211            �            1259    43332    mmd_photogallery_doc_id_seq    SEQUENCE     �   CREATE SEQUENCE public.mmd_photogallery_doc_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 2   DROP SEQUENCE public.mmd_photogallery_doc_id_seq;
       public          postgres    false            �            1259    43333    mmd_photogallery    TABLE     H  CREATE TABLE public.mmd_photogallery (
    sub_doc_id integer DEFAULT nextval('public.mmd_photogallery_doc_id_seq'::regclass) NOT NULL,
    title character varying(500),
    filename character varying(100),
    short_title character varying(100),
    mas_doc_id integer NOT NULL,
    uploaded_on timestamp with time zone,
    status character varying(10) DEFAULT 'L'::character varying,
    inserted_by character varying(50),
    updated_by character varying(50),
    updated_on timestamp with time zone,
    description character varying(5000),
    media_id character varying(10)
);
 $   DROP TABLE public.mmd_photogallery;
       public         heap    postgres    false    213            �            1259    43340    mmd_rti_rti_id_seq    SEQUENCE     {   CREATE SEQUENCE public.mmd_rti_rti_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.mmd_rti_rti_id_seq;
       public          postgres    false            �            1259    43341    mmd_rti    TABLE     }  CREATE TABLE public.mmd_rti (
    rti_id integer DEFAULT nextval('public.mmd_rti_rti_id_seq'::regclass) NOT NULL,
    contents character varying(100000),
    uploaded_on timestamp with time zone,
    status character varying(10) DEFAULT 'L'::character varying,
    inserted_by character varying(50),
    updated_by character varying(50),
    updated_on timestamp with time zone
);
    DROP TABLE public.mmd_rti;
       public         heap    postgres    false    215            �            1259    43348    mmd_rti_faq_id_seq    SEQUENCE     {   CREATE SEQUENCE public.mmd_rti_faq_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.mmd_rti_faq_id_seq;
       public          postgres    false            �            1259    43349    mmd_rti_faq    TABLE     �  CREATE TABLE public.mmd_rti_faq (
    ques_id integer DEFAULT nextval('public.mmd_rti_faq_id_seq'::regclass) NOT NULL,
    question character varying(500),
    answer character varying(5000),
    uploaded_on timestamp with time zone,
    status character varying(10) DEFAULT 'L'::character varying,
    inserted_by character varying(50),
    updated_by character varying(50),
    updated_on timestamp with time zone,
    position_order integer
);
    DROP TABLE public.mmd_rti_faq;
       public         heap    postgres    false    217            �            1259    43356    mmd_services_service_id_seq    SEQUENCE     �   CREATE SEQUENCE public.mmd_services_service_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 2   DROP SEQUENCE public.mmd_services_service_id_seq;
       public          postgres    false            �            1259    43357    mmd_services    TABLE     �  CREATE TABLE public.mmd_services (
    doc_id integer DEFAULT nextval('public.mmd_services_service_id_seq'::regclass) NOT NULL,
    contents character varying(100000),
    category integer NOT NULL,
    uploaded_on timestamp with time zone,
    status character varying(10) DEFAULT 'L'::character varying,
    inserted_by character varying(50),
    updated_by character varying(50),
    updated_on timestamp with time zone,
    service_id integer NOT NULL
);
     DROP TABLE public.mmd_services;
       public         heap    postgres    false    219            �            1259    43364    mmd_videogallery_doc_id_seq    SEQUENCE     �   CREATE SEQUENCE public.mmd_videogallery_doc_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 2   DROP SEQUENCE public.mmd_videogallery_doc_id_seq;
       public          postgres    false            �            1259    43365    mmd_videogallery    TABLE     m  CREATE TABLE public.mmd_videogallery (
    sub_doc_id integer DEFAULT nextval('public.mmd_videogallery_doc_id_seq'::regclass) NOT NULL,
    title character varying(500),
    filename character varying(100),
    short_title character varying(100),
    mas_doc_id integer NOT NULL,
    uploaded_on timestamp with time zone,
    status character varying(10) DEFAULT 'L'::character varying,
    inserted_by character varying(50),
    updated_by character varying(50),
    updated_on timestamp with time zone,
    description character varying(5000),
    media_id character varying(10),
    ad_link character varying(5000)
);
 $   DROP TABLE public.mmd_videogallery;
       public         heap    postgres    false    221            �            1259    43372    mst_aboutus_about_id_seq    SEQUENCE     �   CREATE SEQUENCE public.mst_aboutus_about_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public.mst_aboutus_about_id_seq;
       public          postgres    false            �            1259    43373    mst_aboutus    TABLE     �  CREATE TABLE public.mst_aboutus (
    about_id integer DEFAULT nextval('public.mst_aboutus_about_id_seq'::regclass) NOT NULL,
    title character varying(500),
    uploaded_on timestamp with time zone,
    status character varying(10) DEFAULT 'L'::character varying,
    inserted_by character varying(50),
    updated_by character varying(50),
    updated_on timestamp with time zone
);
    DROP TABLE public.mst_aboutus;
       public         heap    postgres    false    223            �            1259    43380    mst_acts_rules_doc_id_seq    SEQUENCE     �   CREATE SEQUENCE public.mst_acts_rules_doc_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 0   DROP SEQUENCE public.mst_acts_rules_doc_id_seq;
       public          postgres    false            �            1259    43381    mst_acts_rules    TABLE       CREATE TABLE public.mst_acts_rules (
    doc_id integer DEFAULT nextval('public.mst_acts_rules_doc_id_seq'::regclass) NOT NULL,
    title character varying(500),
    filename character varying(100),
    ad_link character varying(100),
    uploaded_on timestamp with time zone,
    status character varying(10) DEFAULT 'L'::character varying,
    inserted_by character varying(50),
    updated_by character varying(50),
    updated_on timestamp with time zone,
    media_id character varying(10),
    short_title character varying(20)
);
 "   DROP TABLE public.mst_acts_rules;
       public         heap    postgres    false    225            �            1259    43388    mst_checklist_contents_id_seq    SEQUENCE     �   CREATE SEQUENCE public.mst_checklist_contents_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 4   DROP SEQUENCE public.mst_checklist_contents_id_seq;
       public          postgres    false            �            1259    43389    mst_checklist_contents    TABLE     ?  CREATE TABLE public.mst_checklist_contents (
    cont_id integer DEFAULT nextval('public.mst_checklist_contents_id_seq'::regclass) NOT NULL,
    title character varying(500),
    filename character varying(100),
    ad_link character varying(100),
    uploaded_on timestamp with time zone,
    status character varying(10) DEFAULT 'L'::character varying,
    inserted_by character varying(50),
    updated_by character varying(50),
    updated_on timestamp with time zone,
    media_id character varying(10),
    short_title character varying(20),
    mas_dept_id integer
);
 *   DROP TABLE public.mst_checklist_contents;
       public         heap    postgres    false    227            �            1259    43396    mst_checklist_dept_id_seq    SEQUENCE     �   CREATE SEQUENCE public.mst_checklist_dept_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 0   DROP SEQUENCE public.mst_checklist_dept_id_seq;
       public          postgres    false            �            1259    43397    mst_checklist_dept    TABLE     �  CREATE TABLE public.mst_checklist_dept (
    dept_id integer DEFAULT nextval('public.mst_checklist_dept_id_seq'::regclass) NOT NULL,
    title character varying(500),
    uploaded_on timestamp with time zone,
    status character varying(10) DEFAULT 'L'::character varying,
    inserted_by character varying(50),
    updated_by character varying(50),
    updated_on timestamp with time zone,
    position_order integer
);
 &   DROP TABLE public.mst_checklist_dept;
       public         heap    postgres    false    229            �            1259    43404    mst_checklist_division_id_seq    SEQUENCE     �   CREATE SEQUENCE public.mst_checklist_division_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 4   DROP SEQUENCE public.mst_checklist_division_id_seq;
       public          postgres    false            �            1259    43405    mst_checklist_division    TABLE     �  CREATE TABLE public.mst_checklist_division (
    div_id integer DEFAULT nextval('public.mst_checklist_division_id_seq'::regclass) NOT NULL,
    div_title character varying(500),
    uploaded_on timestamp with time zone,
    status character varying(10) DEFAULT 'L'::character varying,
    inserted_by character varying(50),
    updated_by character varying(50),
    updated_on timestamp with time zone,
    position_order integer,
    mas_dept_id integer
);
 *   DROP TABLE public.mst_checklist_division;
       public         heap    postgres    false    231            �            1259    43412    mst_checklists_doc_id_seq    SEQUENCE     �   CREATE SEQUENCE public.mst_checklists_doc_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 0   DROP SEQUENCE public.mst_checklists_doc_id_seq;
       public          postgres    false            �            1259    43413    mst_checklists    TABLE       CREATE TABLE public.mst_checklists (
    doc_id integer DEFAULT nextval('public.mst_checklists_doc_id_seq'::regclass) NOT NULL,
    title character varying(500),
    filename character varying(100),
    ad_link character varying(100),
    uploaded_on timestamp with time zone,
    status character varying(10) DEFAULT 'L'::character varying,
    inserted_by character varying(50),
    updated_by character varying(50),
    updated_on timestamp with time zone,
    media_id character varying(10),
    short_title character varying(20)
);
 "   DROP TABLE public.mst_checklists;
       public         heap    postgres    false    233            �            1259    43420    mst_circulars_doc_id_seq    SEQUENCE     �   CREATE SEQUENCE public.mst_circulars_doc_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public.mst_circulars_doc_id_seq;
       public          postgres    false            �            1259    43421    mst_circulars    TABLE       CREATE TABLE public.mst_circulars (
    doc_id integer DEFAULT nextval('public.mst_circulars_doc_id_seq'::regclass) NOT NULL,
    title character varying(500),
    filename character varying(100),
    ad_link character varying(100),
    uploaded_on timestamp with time zone,
    status character varying(10) DEFAULT 'L'::character varying,
    inserted_by character varying(50),
    updated_by character varying(50),
    updated_on timestamp with time zone,
    media_id character varying(10),
    short_title character varying(20)
);
 !   DROP TABLE public.mst_circulars;
       public         heap    postgres    false    235            �            1259    43428    mst_contactus_cont_id_seq    SEQUENCE     �   CREATE SEQUENCE public.mst_contactus_cont_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 0   DROP SEQUENCE public.mst_contactus_cont_id_seq;
       public          postgres    false            �            1259    43429    mst_contactus    TABLE     q  CREATE TABLE public.mst_contactus (
    cont_id integer DEFAULT nextval('public.mst_contactus_cont_id_seq'::regclass) NOT NULL,
    title character varying(200),
    name character varying(500),
    address character varying(5000),
    email character varying(100),
    phone character varying(50),
    uploaded_on timestamp with time zone,
    status character varying(10) DEFAULT 'L'::character varying,
    inserted_by character varying(50),
    updated_by character varying(50),
    updated_on timestamp with time zone,
    position_order integer,
    designation character varying(200),
    fax character varying(50)
);
 !   DROP TABLE public.mst_contactus;
       public         heap    postgres    false    237            �            1259    43436    mst_footerslider_doc_id_seq    SEQUENCE     �   CREATE SEQUENCE public.mst_footerslider_doc_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 2   DROP SEQUENCE public.mst_footerslider_doc_id_seq;
       public          postgres    false            �            1259    43437    mst_footerslider    TABLE       CREATE TABLE public.mst_footerslider (
    doc_id integer DEFAULT nextval('public.mst_footerslider_doc_id_seq'::regclass) NOT NULL,
    title character varying(500),
    filename character varying(500),
    footer_link character varying(500),
    uploaded_on timestamp with time zone,
    inserted_by character varying(50),
    updated_by character varying(50),
    updated_on timestamp with time zone,
    status character varying(10) DEFAULT 'L'::character varying,
    media_id character varying(10),
    position_order integer
);
 $   DROP TABLE public.mst_footerslider;
       public         heap    postgres    false    239            �            1259    43444    mst_forms_doc_id_seq    SEQUENCE     }   CREATE SEQUENCE public.mst_forms_doc_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE public.mst_forms_doc_id_seq;
       public          postgres    false            �            1259    43445 	   mst_forms    TABLE       CREATE TABLE public.mst_forms (
    doc_id integer DEFAULT nextval('public.mst_forms_doc_id_seq'::regclass) NOT NULL,
    title character varying(500),
    filename character varying(100),
    ad_link character varying(100),
    uploaded_on timestamp with time zone,
    status character varying(10) DEFAULT 'L'::character varying,
    inserted_by character varying(50),
    updated_by character varying(50),
    updated_on timestamp with time zone,
    media_id character varying(10),
    short_title character varying(20)
);
    DROP TABLE public.mst_forms;
       public         heap    postgres    false    241            �            1259    43452    mst_login_userid_seq    SEQUENCE     }   CREATE SEQUENCE public.mst_login_userid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE public.mst_login_userid_seq;
       public          postgres    false            �            1259    43453 	   mst_login    TABLE     >  CREATE TABLE public.mst_login (
    user_id integer DEFAULT nextval('public.mst_login_userid_seq'::regclass) NOT NULL,
    username character varying(200) NOT NULL,
    password character varying(200) NOT NULL,
    created_at timestamp with time zone,
    status character varying(5) DEFAULT 'L'::character varying
);
    DROP TABLE public.mst_login;
       public         heap    postgres    false    243            �            1259    43458    mst_logo_logo_id_seq    SEQUENCE     }   CREATE SEQUENCE public.mst_logo_logo_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE public.mst_logo_logo_id_seq;
       public          postgres    false            �            1259    43459    mst_logo    TABLE     ,  CREATE TABLE public.mst_logo (
    logo_id integer DEFAULT nextval('public.mst_logo_logo_id_seq'::regclass) NOT NULL,
    title character varying(500),
    short_title character varying(100),
    filename character varying(100),
    ad_link character varying(500),
    uploaded_on timestamp with time zone,
    status character varying(10) DEFAULT 'L'::character varying,
    inserted_by character varying(50),
    updated_by character varying(50),
    updated_on timestamp with time zone,
    position_order integer,
    media_id character varying(10)
);
    DROP TABLE public.mst_logo;
       public         heap    postgres    false    245            �            1259    43466    mst_media_media_id_seq    SEQUENCE        CREATE SEQUENCE public.mst_media_media_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public.mst_media_media_id_seq;
       public          postgres    false            �            1259    43467 	   mst_media    TABLE     X  CREATE TABLE public.mst_media (
    media_id integer DEFAULT nextval('public.mst_media_media_id_seq'::regclass) NOT NULL,
    title character varying(500),
    alt_title character varying(500),
    filename character varying(100),
    alt_filename character varying(100),
    filesize character varying(50),
    file_extension character varying(50),
    uploaded_on timestamp with time zone,
    status character varying(10) DEFAULT 'L'::character varying,
    inserted_by character varying(50),
    updated_by character varying(50),
    updated_on timestamp with time zone,
    folder_id integer
);
    DROP TABLE public.mst_media;
       public         heap    postgres    false    247            �            1259    43474    mst_mediafolder_folder_id_seq    SEQUENCE     �   CREATE SEQUENCE public.mst_mediafolder_folder_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 4   DROP SEQUENCE public.mst_mediafolder_folder_id_seq;
       public          postgres    false            �            1259    43475    mst_mediafolder    TABLE     �  CREATE TABLE public.mst_mediafolder (
    folder_id integer DEFAULT nextval('public.mst_mediafolder_folder_id_seq'::regclass) NOT NULL,
    foldername character varying(100),
    uploaded_on timestamp with time zone,
    updated_by character varying(50),
    updated_on timestamp with time zone,
    status character varying(5) DEFAULT 'L'::character varying,
    inserted_by integer
);
 #   DROP TABLE public.mst_mediafolder;
       public         heap    postgres    false    249            �            1259    43480    mst_mmd_menu_menu_id_seq    SEQUENCE     �   CREATE SEQUENCE public.mst_mmd_menu_menu_id_seq
    START WITH 1
    INCREMENT BY 1
    MINVALUE 0
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public.mst_mmd_menu_menu_id_seq;
       public          postgres    false            �            1259    43481    mst_mmd_menu    TABLE     X  CREATE TABLE public.mst_mmd_menu (
    menu_id integer DEFAULT nextval('public.mst_mmd_menu_menu_id_seq'::regclass) NOT NULL,
    menu_title character varying(50),
    menu_link character varying(100),
    submenu_id integer DEFAULT 0,
    mainmenu_order integer,
    submenu_order integer,
    mainmenu_status character varying(10) DEFAULT 'L'::character varying,
    submenu_status character varying(10) DEFAULT 'L'::character varying,
    uploaded_on timestamp with time zone,
    inserted_by character varying(50),
    updated_by character varying(50),
    updated_on timestamp with time zone
);
     DROP TABLE public.mst_mmd_menu;
       public         heap    postgres    false    251            �            1259    43488    mst_photogallery_doc_id_seq    SEQUENCE     �   CREATE SEQUENCE public.mst_photogallery_doc_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 2   DROP SEQUENCE public.mst_photogallery_doc_id_seq;
       public          postgres    false            �            1259    43489    mst_photogallery    TABLE     �  CREATE TABLE public.mst_photogallery (
    doc_id integer DEFAULT nextval('public.mst_photogallery_doc_id_seq'::regclass) NOT NULL,
    title character varying(100),
    uploaded_on timestamp with time zone,
    status character varying(10) DEFAULT 'L'::character varying,
    inserted_by character varying(50),
    updated_by character varying(50),
    updated_on timestamp with time zone,
    position_order integer
);
 $   DROP TABLE public.mst_photogallery;
       public         heap    postgres    false    253            �            1259    43494    mst_quicklinks_doc_id_seq    SEQUENCE     �   CREATE SEQUENCE public.mst_quicklinks_doc_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 0   DROP SEQUENCE public.mst_quicklinks_doc_id_seq;
       public          postgres    false                        1259    43495    mst_quicklinks    TABLE     �  CREATE TABLE public.mst_quicklinks (
    doc_id integer DEFAULT nextval('public.mst_quicklinks_doc_id_seq'::regclass) NOT NULL,
    title character varying(500),
    footer_link character varying(500),
    uploaded_on timestamp with time zone,
    inserted_by character varying(50),
    updated_by character varying(50),
    updated_on timestamp with time zone,
    status character varying(10) DEFAULT 'L'::character varying,
    position_order integer
);
 "   DROP TABLE public.mst_quicklinks;
       public         heap    postgres    false    255                       1259    43502     mst_scrolling_text_scroll_id_seq    SEQUENCE     �   CREATE SEQUENCE public.mst_scrolling_text_scroll_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 7   DROP SEQUENCE public.mst_scrolling_text_scroll_id_seq;
       public          postgres    false                       1259    43503    mst_scrolling_text    TABLE        CREATE TABLE public.mst_scrolling_text (
    scroll_id integer DEFAULT nextval('public.mst_scrolling_text_scroll_id_seq'::regclass) NOT NULL,
    title character varying(500),
    filename character varying(100),
    ad_link character varying(100),
    uploaded_on timestamp with time zone,
    status character varying(10) DEFAULT 'L'::character varying,
    inserted_by character varying(50),
    updated_by character varying(50),
    updated_on timestamp with time zone,
    media_id character varying(10)
);
 &   DROP TABLE public.mst_scrolling_text;
       public         heap    postgres    false    257                       1259    43510    mst_services_service_id_seq    SEQUENCE     �   CREATE SEQUENCE public.mst_services_service_id_seq
    START WITH 5
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 2   DROP SEQUENCE public.mst_services_service_id_seq;
       public          postgres    false                       1259    43511    mst_services    TABLE     �  CREATE TABLE public.mst_services (
    service_id integer DEFAULT nextval('public.mst_services_service_id_seq'::regclass) NOT NULL,
    title character varying(100),
    category integer NOT NULL,
    uploaded_on timestamp with time zone,
    status character varying(10) DEFAULT 'L'::character varying,
    inserted_by character varying(50),
    updated_by character varying(50),
    updated_on timestamp with time zone
);
     DROP TABLE public.mst_services;
       public         heap    postgres    false    259                       1259    43516    mst_slider_slider_id_seq    SEQUENCE     �   CREATE SEQUENCE public.mst_slider_slider_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public.mst_slider_slider_id_seq;
       public          postgres    false                       1259    43517 
   mst_slider    TABLE       CREATE TABLE public.mst_slider (
    slider_id integer DEFAULT nextval('public.mst_slider_slider_id_seq'::regclass) NOT NULL,
    title character varying(500),
    short_title character varying(100),
    filename character varying(100),
    uploaded_on timestamp with time zone,
    status character varying(10) DEFAULT 'L'::character varying,
    inserted_by character varying(50),
    updated_by character varying(50),
    updated_on timestamp with time zone,
    position_order integer,
    media_id character varying(10)
);
    DROP TABLE public.mst_slider;
       public         heap    postgres    false    261                       1259    43524 #   mst_supporting_documents_doc_id_seq    SEQUENCE     �   CREATE SEQUENCE public.mst_supporting_documents_doc_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 :   DROP SEQUENCE public.mst_supporting_documents_doc_id_seq;
       public          postgres    false                       1259    43525    mst_supporting_documents    TABLE     F  CREATE TABLE public.mst_supporting_documents (
    doc_id integer DEFAULT nextval('public.mst_supporting_documents_doc_id_seq'::regclass) NOT NULL,
    title character varying(1500),
    filename character varying(100),
    ad_link character varying(100),
    uploaded_on timestamp with time zone,
    status character varying(10) DEFAULT 'L'::character varying,
    inserted_by character varying(50),
    updated_by character varying(50),
    updated_on timestamp with time zone,
    short_title character varying(30),
    media_id character varying(10),
    service_id integer
);
 ,   DROP TABLE public.mst_supporting_documents;
       public         heap    postgres    false    263            	           1259    43532    mst_usefullinks_doc_id_seq    SEQUENCE     �   CREATE SEQUENCE public.mst_usefullinks_doc_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 1   DROP SEQUENCE public.mst_usefullinks_doc_id_seq;
       public          postgres    false            
           1259    43533    mst_usefullinks    TABLE     �  CREATE TABLE public.mst_usefullinks (
    doc_id integer DEFAULT nextval('public.mst_usefullinks_doc_id_seq'::regclass) NOT NULL,
    title character varying(500),
    footer_link character varying(500),
    uploaded_on timestamp with time zone,
    inserted_by character varying(50),
    updated_by character varying(50),
    updated_on timestamp with time zone,
    status character varying(10) DEFAULT 'L'::character varying,
    position_order integer
);
 #   DROP TABLE public.mst_usefullinks;
       public         heap    postgres    false    265                       1259    43540    mst_videogallery_doc_id_seq    SEQUENCE     �   CREATE SEQUENCE public.mst_videogallery_doc_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 2   DROP SEQUENCE public.mst_videogallery_doc_id_seq;
       public          postgres    false                       1259    43541    mst_videogallery    TABLE     �  CREATE TABLE public.mst_videogallery (
    doc_id integer DEFAULT nextval('public.mst_videogallery_doc_id_seq'::regclass) NOT NULL,
    title character varying(100),
    uploaded_on timestamp with time zone,
    status character varying(10) DEFAULT 'L'::character varying,
    inserted_by character varying(50),
    updated_by character varying(50),
    updated_on timestamp with time zone,
    announce_dt date
);
 $   DROP TABLE public.mst_videogallery;
       public         heap    postgres    false    267                       1259    43546    mst_whoswho_contents_id_seq    SEQUENCE     �   CREATE SEQUENCE public.mst_whoswho_contents_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 2   DROP SEQUENCE public.mst_whoswho_contents_id_seq;
       public          postgres    false                       1259    43547    mst_whoswho_contents    TABLE     J  CREATE TABLE public.mst_whoswho_contents (
    cont_id integer DEFAULT nextval('public.mst_whoswho_contents_id_seq'::regclass) NOT NULL,
    name character varying(500),
    designation character varying(100),
    email character varying(100),
    phone character varying(20),
    uploaded_on timestamp with time zone,
    status character varying(10) DEFAULT 'L'::character varying,
    inserted_by character varying(50),
    updated_by character varying(50),
    updated_on timestamp with time zone,
    position_order integer,
    mas_dept_id integer,
    mas_division_id integer
);
 (   DROP TABLE public.mst_whoswho_contents;
       public         heap    postgres    false    269                       1259    43554    mst_whoswho_dept_id_seq    SEQUENCE     �   CREATE SEQUENCE public.mst_whoswho_dept_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.mst_whoswho_dept_id_seq;
       public          postgres    false                       1259    43555    mst_whoswho_dept    TABLE     �  CREATE TABLE public.mst_whoswho_dept (
    dept_id integer DEFAULT nextval('public.mst_whoswho_dept_id_seq'::regclass) NOT NULL,
    title character varying(500),
    uploaded_on timestamp with time zone,
    status character varying(10) DEFAULT 'L'::character varying,
    inserted_by character varying(50),
    updated_by character varying(50),
    updated_on timestamp with time zone,
    position_order integer
);
 $   DROP TABLE public.mst_whoswho_dept;
       public         heap    postgres    false    271                       1259    43562    mst_whoswho_division_id_seq    SEQUENCE     �   CREATE SEQUENCE public.mst_whoswho_division_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 2   DROP SEQUENCE public.mst_whoswho_division_id_seq;
       public          postgres    false                       1259    43563    mst_whoswho_division    TABLE     �  CREATE TABLE public.mst_whoswho_division (
    div_id integer DEFAULT nextval('public.mst_whoswho_division_id_seq'::regclass) NOT NULL,
    div_title character varying(500),
    uploaded_on timestamp with time zone,
    status character varying(10) DEFAULT 'L'::character varying,
    inserted_by character varying(50),
    updated_by character varying(50),
    updated_on timestamp with time zone,
    position_order integer,
    mas_dept_id integer
);
 (   DROP TABLE public.mst_whoswho_division;
       public         heap    postgres    false    273                      0    43316    mmd_aboutus 
   TABLE DATA           z   COPY public.mmd_aboutus (doc_id, contents, page_id, uploaded_on, status, inserted_by, updated_by, updated_on) FROM stdin;
    public          postgres    false    210   ��                 0    43324    mmd_login_trial 
   TABLE DATA           z   COPY public.mmd_login_trial (trial_id, admin_username, ip_address, browser_name, status, user_id, login_time) FROM stdin;
    public          postgres    false    212   ��                 0    43333    mmd_photogallery 
   TABLE DATA           �   COPY public.mmd_photogallery (sub_doc_id, title, filename, short_title, mas_doc_id, uploaded_on, status, inserted_by, updated_by, updated_on, description, media_id) FROM stdin;
    public          postgres    false    214   F�                 0    43341    mmd_rti 
   TABLE DATA           m   COPY public.mmd_rti (rti_id, contents, uploaded_on, status, inserted_by, updated_by, updated_on) FROM stdin;
    public          postgres    false    216   �                 0    43349    mmd_rti_faq 
   TABLE DATA           �   COPY public.mmd_rti_faq (ques_id, question, answer, uploaded_on, status, inserted_by, updated_by, updated_on, position_order) FROM stdin;
    public          postgres    false    218   ]�                 0    43357    mmd_services 
   TABLE DATA           �   COPY public.mmd_services (doc_id, contents, category, uploaded_on, status, inserted_by, updated_by, updated_on, service_id) FROM stdin;
    public          postgres    false    220   j                 0    43365    mmd_videogallery 
   TABLE DATA           �   COPY public.mmd_videogallery (sub_doc_id, title, filename, short_title, mas_doc_id, uploaded_on, status, inserted_by, updated_by, updated_on, description, media_id, ad_link) FROM stdin;
    public          postgres    false    222   %                0    43373    mst_aboutus 
   TABLE DATA           p   COPY public.mst_aboutus (about_id, title, uploaded_on, status, inserted_by, updated_by, updated_on) FROM stdin;
    public          postgres    false    224   B      !          0    43381    mst_acts_rules 
   TABLE DATA           �   COPY public.mst_acts_rules (doc_id, title, filename, ad_link, uploaded_on, status, inserted_by, updated_by, updated_on, media_id, short_title) FROM stdin;
    public          postgres    false    226   _      #          0    43389    mst_checklist_contents 
   TABLE DATA           �   COPY public.mst_checklist_contents (cont_id, title, filename, ad_link, uploaded_on, status, inserted_by, updated_by, updated_on, media_id, short_title, mas_dept_id) FROM stdin;
    public          postgres    false    228         %          0    43397    mst_checklist_dept 
   TABLE DATA           �   COPY public.mst_checklist_dept (dept_id, title, uploaded_on, status, inserted_by, updated_by, updated_on, position_order) FROM stdin;
    public          postgres    false    230   i      '          0    43405    mst_checklist_division 
   TABLE DATA           �   COPY public.mst_checklist_division (div_id, div_title, uploaded_on, status, inserted_by, updated_by, updated_on, position_order, mas_dept_id) FROM stdin;
    public          postgres    false    232   �      )          0    43413    mst_checklists 
   TABLE DATA           �   COPY public.mst_checklists (doc_id, title, filename, ad_link, uploaded_on, status, inserted_by, updated_by, updated_on, media_id, short_title) FROM stdin;
    public          postgres    false    234         +          0    43421    mst_circulars 
   TABLE DATA           �   COPY public.mst_circulars (doc_id, title, filename, ad_link, uploaded_on, status, inserted_by, updated_by, updated_on, media_id, short_title) FROM stdin;
    public          postgres    false    236   �      -          0    43429    mst_contactus 
   TABLE DATA           �   COPY public.mst_contactus (cont_id, title, name, address, email, phone, uploaded_on, status, inserted_by, updated_by, updated_on, position_order, designation, fax) FROM stdin;
    public          postgres    false    238   �      /          0    43437    mst_footerslider 
   TABLE DATA           �   COPY public.mst_footerslider (doc_id, title, filename, footer_link, uploaded_on, inserted_by, updated_by, updated_on, status, media_id, position_order) FROM stdin;
    public          postgres    false    240   �      1          0    43445 	   mst_forms 
   TABLE DATA           �   COPY public.mst_forms (doc_id, title, filename, ad_link, uploaded_on, status, inserted_by, updated_by, updated_on, media_id, short_title) FROM stdin;
    public          postgres    false    242   �      3          0    43453 	   mst_login 
   TABLE DATA           T   COPY public.mst_login (user_id, username, password, created_at, status) FROM stdin;
    public          postgres    false    244   �      5          0    43459    mst_logo 
   TABLE DATA           �   COPY public.mst_logo (logo_id, title, short_title, filename, ad_link, uploaded_on, status, inserted_by, updated_by, updated_on, position_order, media_id) FROM stdin;
    public          postgres    false    246   	      7          0    43467 	   mst_media 
   TABLE DATA           �   COPY public.mst_media (media_id, title, alt_title, filename, alt_filename, filesize, file_extension, uploaded_on, status, inserted_by, updated_by, updated_on, folder_id) FROM stdin;
    public          postgres    false    248   �	      9          0    43475    mst_mediafolder 
   TABLE DATA           z   COPY public.mst_mediafolder (folder_id, foldername, uploaded_on, updated_by, updated_on, status, inserted_by) FROM stdin;
    public          postgres    false    250   P      ;          0    43481    mst_mmd_menu 
   TABLE DATA           �   COPY public.mst_mmd_menu (menu_id, menu_title, menu_link, submenu_id, mainmenu_order, submenu_order, mainmenu_status, submenu_status, uploaded_on, inserted_by, updated_by, updated_on) FROM stdin;
    public          postgres    false    252   �      =          0    43489    mst_photogallery 
   TABLE DATA           �   COPY public.mst_photogallery (doc_id, title, uploaded_on, status, inserted_by, updated_by, updated_on, position_order) FROM stdin;
    public          postgres    false    254   W      ?          0    43495    mst_quicklinks 
   TABLE DATA           �   COPY public.mst_quicklinks (doc_id, title, footer_link, uploaded_on, inserted_by, updated_by, updated_on, status, position_order) FROM stdin;
    public          postgres    false    256   �      A          0    43503    mst_scrolling_text 
   TABLE DATA           �   COPY public.mst_scrolling_text (scroll_id, title, filename, ad_link, uploaded_on, status, inserted_by, updated_by, updated_on, media_id) FROM stdin;
    public          postgres    false    258         C          0    43511    mst_services 
   TABLE DATA           }   COPY public.mst_services (service_id, title, category, uploaded_on, status, inserted_by, updated_by, updated_on) FROM stdin;
    public          postgres    false    260   d      E          0    43517 
   mst_slider 
   TABLE DATA           �   COPY public.mst_slider (slider_id, title, short_title, filename, uploaded_on, status, inserted_by, updated_by, updated_on, position_order, media_id) FROM stdin;
    public          postgres    false    262   �      G          0    43525    mst_supporting_documents 
   TABLE DATA           �   COPY public.mst_supporting_documents (doc_id, title, filename, ad_link, uploaded_on, status, inserted_by, updated_by, updated_on, short_title, media_id, service_id) FROM stdin;
    public          postgres    false    264   S      I          0    43533    mst_usefullinks 
   TABLE DATA           �   COPY public.mst_usefullinks (doc_id, title, footer_link, uploaded_on, inserted_by, updated_by, updated_on, status, position_order) FROM stdin;
    public          postgres    false    266   �      K          0    43541    mst_videogallery 
   TABLE DATA           �   COPY public.mst_videogallery (doc_id, title, uploaded_on, status, inserted_by, updated_by, updated_on, announce_dt) FROM stdin;
    public          postgres    false    268   A      M          0    43547    mst_whoswho_contents 
   TABLE DATA           �   COPY public.mst_whoswho_contents (cont_id, name, designation, email, phone, uploaded_on, status, inserted_by, updated_by, updated_on, position_order, mas_dept_id, mas_division_id) FROM stdin;
    public          postgres    false    270   ^      O          0    43555    mst_whoswho_dept 
   TABLE DATA           �   COPY public.mst_whoswho_dept (dept_id, title, uploaded_on, status, inserted_by, updated_by, updated_on, position_order) FROM stdin;
    public          postgres    false    272   �      Q          0    43563    mst_whoswho_division 
   TABLE DATA           �   COPY public.mst_whoswho_division (div_id, div_title, uploaded_on, status, inserted_by, updated_by, updated_on, position_order, mas_dept_id) FROM stdin;
    public          postgres    false    274   ~      X           0    0    mmd_aboutus_about_id_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.mmd_aboutus_about_id_seq', 6, true);
          public          postgres    false    209            Y           0    0    mmd_login_trial_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.mmd_login_trial_seq', 38, true);
          public          postgres    false    211            Z           0    0    mmd_photogallery_doc_id_seq    SEQUENCE SET     I   SELECT pg_catalog.setval('public.mmd_photogallery_doc_id_seq', 4, true);
          public          postgres    false    213            [           0    0    mmd_rti_faq_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.mmd_rti_faq_id_seq', 3, true);
          public          postgres    false    217            \           0    0    mmd_rti_rti_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.mmd_rti_rti_id_seq', 4, true);
          public          postgres    false    215            ]           0    0    mmd_services_service_id_seq    SEQUENCE SET     J   SELECT pg_catalog.setval('public.mmd_services_service_id_seq', 15, true);
          public          postgres    false    219            ^           0    0    mmd_videogallery_doc_id_seq    SEQUENCE SET     J   SELECT pg_catalog.setval('public.mmd_videogallery_doc_id_seq', 1, false);
          public          postgres    false    221            _           0    0    mst_aboutus_about_id_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public.mst_aboutus_about_id_seq', 1, false);
          public          postgres    false    223            `           0    0    mst_acts_rules_doc_id_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public.mst_acts_rules_doc_id_seq', 2, true);
          public          postgres    false    225            a           0    0    mst_checklist_contents_id_seq    SEQUENCE SET     K   SELECT pg_catalog.setval('public.mst_checklist_contents_id_seq', 4, true);
          public          postgres    false    227            b           0    0    mst_checklist_dept_id_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public.mst_checklist_dept_id_seq', 2, true);
          public          postgres    false    229            c           0    0    mst_checklist_division_id_seq    SEQUENCE SET     K   SELECT pg_catalog.setval('public.mst_checklist_division_id_seq', 1, true);
          public          postgres    false    231            d           0    0    mst_checklists_doc_id_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public.mst_checklists_doc_id_seq', 1, true);
          public          postgres    false    233            e           0    0    mst_circulars_doc_id_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.mst_circulars_doc_id_seq', 1, true);
          public          postgres    false    235            f           0    0    mst_contactus_cont_id_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public.mst_contactus_cont_id_seq', 3, true);
          public          postgres    false    237            g           0    0    mst_footerslider_doc_id_seq    SEQUENCE SET     J   SELECT pg_catalog.setval('public.mst_footerslider_doc_id_seq', 1, false);
          public          postgres    false    239            h           0    0    mst_forms_doc_id_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.mst_forms_doc_id_seq', 3, true);
          public          postgres    false    241            i           0    0    mst_login_userid_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.mst_login_userid_seq', 1, true);
          public          postgres    false    243            j           0    0    mst_logo_logo_id_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.mst_logo_logo_id_seq', 3, true);
          public          postgres    false    245            k           0    0    mst_media_media_id_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.mst_media_media_id_seq', 21, true);
          public          postgres    false    247            l           0    0    mst_mediafolder_folder_id_seq    SEQUENCE SET     K   SELECT pg_catalog.setval('public.mst_mediafolder_folder_id_seq', 3, true);
          public          postgres    false    249            m           0    0    mst_mmd_menu_menu_id_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public.mst_mmd_menu_menu_id_seq', 29, true);
          public          postgres    false    251            n           0    0    mst_photogallery_doc_id_seq    SEQUENCE SET     I   SELECT pg_catalog.setval('public.mst_photogallery_doc_id_seq', 2, true);
          public          postgres    false    253            o           0    0    mst_quicklinks_doc_id_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public.mst_quicklinks_doc_id_seq', 1, true);
          public          postgres    false    255            p           0    0     mst_scrolling_text_scroll_id_seq    SEQUENCE SET     N   SELECT pg_catalog.setval('public.mst_scrolling_text_scroll_id_seq', 4, true);
          public          postgres    false    257            q           0    0    mst_services_service_id_seq    SEQUENCE SET     J   SELECT pg_catalog.setval('public.mst_services_service_id_seq', 5, false);
          public          postgres    false    259            r           0    0    mst_slider_slider_id_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.mst_slider_slider_id_seq', 4, true);
          public          postgres    false    261            s           0    0 #   mst_supporting_documents_doc_id_seq    SEQUENCE SET     R   SELECT pg_catalog.setval('public.mst_supporting_documents_doc_id_seq', 13, true);
          public          postgres    false    263            t           0    0    mst_usefullinks_doc_id_seq    SEQUENCE SET     H   SELECT pg_catalog.setval('public.mst_usefullinks_doc_id_seq', 2, true);
          public          postgres    false    265            u           0    0    mst_videogallery_doc_id_seq    SEQUENCE SET     J   SELECT pg_catalog.setval('public.mst_videogallery_doc_id_seq', 1, false);
          public          postgres    false    267            v           0    0    mst_whoswho_contents_id_seq    SEQUENCE SET     I   SELECT pg_catalog.setval('public.mst_whoswho_contents_id_seq', 7, true);
          public          postgres    false    269            w           0    0    mst_whoswho_dept_id_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.mst_whoswho_dept_id_seq', 5, true);
          public          postgres    false    271            x           0    0    mst_whoswho_division_id_seq    SEQUENCE SET     I   SELECT pg_catalog.setval('public.mst_whoswho_division_id_seq', 6, true);
          public          postgres    false    273            D           2606    43571    mmd_aboutus mmd_aboutus_pkey 
   CONSTRAINT     ^   ALTER TABLE ONLY public.mmd_aboutus
    ADD CONSTRAINT mmd_aboutus_pkey PRIMARY KEY (doc_id);
 F   ALTER TABLE ONLY public.mmd_aboutus DROP CONSTRAINT mmd_aboutus_pkey;
       public            postgres    false    210            F           2606    43573 $   mmd_login_trial mmd_login_trial_pkey 
   CONSTRAINT     h   ALTER TABLE ONLY public.mmd_login_trial
    ADD CONSTRAINT mmd_login_trial_pkey PRIMARY KEY (trial_id);
 N   ALTER TABLE ONLY public.mmd_login_trial DROP CONSTRAINT mmd_login_trial_pkey;
       public            postgres    false    212            H           2606    43575 &   mmd_photogallery mmd_photogallery_pkey 
   CONSTRAINT     l   ALTER TABLE ONLY public.mmd_photogallery
    ADD CONSTRAINT mmd_photogallery_pkey PRIMARY KEY (sub_doc_id);
 P   ALTER TABLE ONLY public.mmd_photogallery DROP CONSTRAINT mmd_photogallery_pkey;
       public            postgres    false    214            L           2606    43577    mmd_rti_faq mmd_rti_faq_pkey 
   CONSTRAINT     _   ALTER TABLE ONLY public.mmd_rti_faq
    ADD CONSTRAINT mmd_rti_faq_pkey PRIMARY KEY (ques_id);
 F   ALTER TABLE ONLY public.mmd_rti_faq DROP CONSTRAINT mmd_rti_faq_pkey;
       public            postgres    false    218            J           2606    43579    mmd_rti mmd_rti_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.mmd_rti
    ADD CONSTRAINT mmd_rti_pkey PRIMARY KEY (rti_id);
 >   ALTER TABLE ONLY public.mmd_rti DROP CONSTRAINT mmd_rti_pkey;
       public            postgres    false    216            N           2606    43581    mmd_services mmd_services_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public.mmd_services
    ADD CONSTRAINT mmd_services_pkey PRIMARY KEY (doc_id);
 H   ALTER TABLE ONLY public.mmd_services DROP CONSTRAINT mmd_services_pkey;
       public            postgres    false    220            P           2606    43583 &   mmd_videogallery mmd_videogallery_pkey 
   CONSTRAINT     l   ALTER TABLE ONLY public.mmd_videogallery
    ADD CONSTRAINT mmd_videogallery_pkey PRIMARY KEY (sub_doc_id);
 P   ALTER TABLE ONLY public.mmd_videogallery DROP CONSTRAINT mmd_videogallery_pkey;
       public            postgres    false    222            R           2606    43585    mst_aboutus mst_aboutus_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public.mst_aboutus
    ADD CONSTRAINT mst_aboutus_pkey PRIMARY KEY (about_id);
 F   ALTER TABLE ONLY public.mst_aboutus DROP CONSTRAINT mst_aboutus_pkey;
       public            postgres    false    224            T           2606    43587 "   mst_acts_rules mst_acts_rules_pkey 
   CONSTRAINT     d   ALTER TABLE ONLY public.mst_acts_rules
    ADD CONSTRAINT mst_acts_rules_pkey PRIMARY KEY (doc_id);
 L   ALTER TABLE ONLY public.mst_acts_rules DROP CONSTRAINT mst_acts_rules_pkey;
       public            postgres    false    226            V           2606    43589 2   mst_checklist_contents mst_checklist_contents_pkey 
   CONSTRAINT     u   ALTER TABLE ONLY public.mst_checklist_contents
    ADD CONSTRAINT mst_checklist_contents_pkey PRIMARY KEY (cont_id);
 \   ALTER TABLE ONLY public.mst_checklist_contents DROP CONSTRAINT mst_checklist_contents_pkey;
       public            postgres    false    228            X           2606    43591 *   mst_checklist_dept mst_checklist_dept_pkey 
   CONSTRAINT     m   ALTER TABLE ONLY public.mst_checklist_dept
    ADD CONSTRAINT mst_checklist_dept_pkey PRIMARY KEY (dept_id);
 T   ALTER TABLE ONLY public.mst_checklist_dept DROP CONSTRAINT mst_checklist_dept_pkey;
       public            postgres    false    230            Z           2606    43593 2   mst_checklist_division mst_checklist_division_pkey 
   CONSTRAINT     t   ALTER TABLE ONLY public.mst_checklist_division
    ADD CONSTRAINT mst_checklist_division_pkey PRIMARY KEY (div_id);
 \   ALTER TABLE ONLY public.mst_checklist_division DROP CONSTRAINT mst_checklist_division_pkey;
       public            postgres    false    232            \           2606    43595 "   mst_checklists mst_checklists_pkey 
   CONSTRAINT     d   ALTER TABLE ONLY public.mst_checklists
    ADD CONSTRAINT mst_checklists_pkey PRIMARY KEY (doc_id);
 L   ALTER TABLE ONLY public.mst_checklists DROP CONSTRAINT mst_checklists_pkey;
       public            postgres    false    234            ^           2606    43597     mst_circulars mst_circulars_pkey 
   CONSTRAINT     b   ALTER TABLE ONLY public.mst_circulars
    ADD CONSTRAINT mst_circulars_pkey PRIMARY KEY (doc_id);
 J   ALTER TABLE ONLY public.mst_circulars DROP CONSTRAINT mst_circulars_pkey;
       public            postgres    false    236            `           2606    43599     mst_contactus mst_contactus_pkey 
   CONSTRAINT     c   ALTER TABLE ONLY public.mst_contactus
    ADD CONSTRAINT mst_contactus_pkey PRIMARY KEY (cont_id);
 J   ALTER TABLE ONLY public.mst_contactus DROP CONSTRAINT mst_contactus_pkey;
       public            postgres    false    238            b           2606    43601 &   mst_footerslider mst_footerslider_pkey 
   CONSTRAINT     h   ALTER TABLE ONLY public.mst_footerslider
    ADD CONSTRAINT mst_footerslider_pkey PRIMARY KEY (doc_id);
 P   ALTER TABLE ONLY public.mst_footerslider DROP CONSTRAINT mst_footerslider_pkey;
       public            postgres    false    240            d           2606    43603    mst_forms mst_forms_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.mst_forms
    ADD CONSTRAINT mst_forms_pkey PRIMARY KEY (doc_id);
 B   ALTER TABLE ONLY public.mst_forms DROP CONSTRAINT mst_forms_pkey;
       public            postgres    false    242            f           2606    43605    mst_login mst_login_pkey 
   CONSTRAINT     [   ALTER TABLE ONLY public.mst_login
    ADD CONSTRAINT mst_login_pkey PRIMARY KEY (user_id);
 B   ALTER TABLE ONLY public.mst_login DROP CONSTRAINT mst_login_pkey;
       public            postgres    false    244            h           2606    43607    mst_logo mst_logo_pkey 
   CONSTRAINT     Y   ALTER TABLE ONLY public.mst_logo
    ADD CONSTRAINT mst_logo_pkey PRIMARY KEY (logo_id);
 @   ALTER TABLE ONLY public.mst_logo DROP CONSTRAINT mst_logo_pkey;
       public            postgres    false    246            j           2606    43609    mst_media mst_media_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public.mst_media
    ADD CONSTRAINT mst_media_pkey PRIMARY KEY (media_id);
 B   ALTER TABLE ONLY public.mst_media DROP CONSTRAINT mst_media_pkey;
       public            postgres    false    248            l           2606    43611 $   mst_mediafolder mst_mediafolder_pkey 
   CONSTRAINT     i   ALTER TABLE ONLY public.mst_mediafolder
    ADD CONSTRAINT mst_mediafolder_pkey PRIMARY KEY (folder_id);
 N   ALTER TABLE ONLY public.mst_mediafolder DROP CONSTRAINT mst_mediafolder_pkey;
       public            postgres    false    250            n           2606    43613    mst_mmd_menu mst_mmd_menu_pkey 
   CONSTRAINT     a   ALTER TABLE ONLY public.mst_mmd_menu
    ADD CONSTRAINT mst_mmd_menu_pkey PRIMARY KEY (menu_id);
 H   ALTER TABLE ONLY public.mst_mmd_menu DROP CONSTRAINT mst_mmd_menu_pkey;
       public            postgres    false    252            p           2606    43615 &   mst_photogallery mst_photogallery_pkey 
   CONSTRAINT     h   ALTER TABLE ONLY public.mst_photogallery
    ADD CONSTRAINT mst_photogallery_pkey PRIMARY KEY (doc_id);
 P   ALTER TABLE ONLY public.mst_photogallery DROP CONSTRAINT mst_photogallery_pkey;
       public            postgres    false    254            r           2606    43617 "   mst_quicklinks mst_quicklinks_pkey 
   CONSTRAINT     d   ALTER TABLE ONLY public.mst_quicklinks
    ADD CONSTRAINT mst_quicklinks_pkey PRIMARY KEY (doc_id);
 L   ALTER TABLE ONLY public.mst_quicklinks DROP CONSTRAINT mst_quicklinks_pkey;
       public            postgres    false    256            t           2606    43619 %   mst_scrolling_text mst_scrolling_pkey 
   CONSTRAINT     j   ALTER TABLE ONLY public.mst_scrolling_text
    ADD CONSTRAINT mst_scrolling_pkey PRIMARY KEY (scroll_id);
 O   ALTER TABLE ONLY public.mst_scrolling_text DROP CONSTRAINT mst_scrolling_pkey;
       public            postgres    false    258            v           2606    43621    mst_services mst_services_pkey 
   CONSTRAINT     d   ALTER TABLE ONLY public.mst_services
    ADD CONSTRAINT mst_services_pkey PRIMARY KEY (service_id);
 H   ALTER TABLE ONLY public.mst_services DROP CONSTRAINT mst_services_pkey;
       public            postgres    false    260            x           2606    43623    mst_slider mst_slider_pkey 
   CONSTRAINT     _   ALTER TABLE ONLY public.mst_slider
    ADD CONSTRAINT mst_slider_pkey PRIMARY KEY (slider_id);
 D   ALTER TABLE ONLY public.mst_slider DROP CONSTRAINT mst_slider_pkey;
       public            postgres    false    262            z           2606    43625 9   mst_supporting_documents mst_supporting_documents_en_pkey 
   CONSTRAINT     {   ALTER TABLE ONLY public.mst_supporting_documents
    ADD CONSTRAINT mst_supporting_documents_en_pkey PRIMARY KEY (doc_id);
 c   ALTER TABLE ONLY public.mst_supporting_documents DROP CONSTRAINT mst_supporting_documents_en_pkey;
       public            postgres    false    264            |           2606    43627 $   mst_usefullinks mst_usefullinks_pkey 
   CONSTRAINT     f   ALTER TABLE ONLY public.mst_usefullinks
    ADD CONSTRAINT mst_usefullinks_pkey PRIMARY KEY (doc_id);
 N   ALTER TABLE ONLY public.mst_usefullinks DROP CONSTRAINT mst_usefullinks_pkey;
       public            postgres    false    266            ~           2606    43629 &   mst_videogallery mst_videogallery_pkey 
   CONSTRAINT     h   ALTER TABLE ONLY public.mst_videogallery
    ADD CONSTRAINT mst_videogallery_pkey PRIMARY KEY (doc_id);
 P   ALTER TABLE ONLY public.mst_videogallery DROP CONSTRAINT mst_videogallery_pkey;
       public            postgres    false    268            �           2606    43631 .   mst_whoswho_contents mst_whoswho_contents_pkey 
   CONSTRAINT     q   ALTER TABLE ONLY public.mst_whoswho_contents
    ADD CONSTRAINT mst_whoswho_contents_pkey PRIMARY KEY (cont_id);
 X   ALTER TABLE ONLY public.mst_whoswho_contents DROP CONSTRAINT mst_whoswho_contents_pkey;
       public            postgres    false    270            �           2606    43633 &   mst_whoswho_dept mst_whoswho_dept_pkey 
   CONSTRAINT     i   ALTER TABLE ONLY public.mst_whoswho_dept
    ADD CONSTRAINT mst_whoswho_dept_pkey PRIMARY KEY (dept_id);
 P   ALTER TABLE ONLY public.mst_whoswho_dept DROP CONSTRAINT mst_whoswho_dept_pkey;
       public            postgres    false    272            �           2606    43635 .   mst_whoswho_division mst_whoswho_division_pkey 
   CONSTRAINT     p   ALTER TABLE ONLY public.mst_whoswho_division
    ADD CONSTRAINT mst_whoswho_division_pkey PRIMARY KEY (div_id);
 X   ALTER TABLE ONLY public.mst_whoswho_division DROP CONSTRAINT mst_whoswho_division_pkey;
       public            postgres    false    274               �  x��X]o�6}v~���g�4��5������7}�G�Fl(R!)Of}Ͻ��d&��X��	F����y���੉'��e<��Ki��e�Ίy�m[����W�����΃���\����O^$!"72�=�غx�m�>ʅk�aT�bZ����g�F/��t��	�\*Ui�+K�+��������Fm�(��J��F��'��=k%�8:~q,J�C2��^Hq��"��-��5�:�&oc�º����[��ř�t�ZK��*e-IB�H�meT����ѯ��y��F�%˼�҆��(��k���<��TV�;&۟�F����k	����)�a/� ;:!���W��<`�k��px��J�u�D��I-���mt�p8q�Ǚ�z!)�@4�GR�ީ%���/�~^���g��̫��y���)U;�%]dȓH����+)~��+��?�B#�2�~�8��Ҋ�bkQ+��6o��Z'�?#r*9t&nR�-dЏm�����A�>��y&��,�E�3�����J��>�^�J�(5�
�Hʤ`zS2~q�x�A�p*zz}}.
��Q&!���<��"��(BO�sd`����9��cյA�HnD+�\i,{~�$
׈wn�x�6/n�b@����:�TA��̐�Y��j.��?�(&z��϶�#M�x��w�ҢP���d�T<�usB���!oU&*g� �'YS}s(�ک���3W7**���u_,K/�w6d�-nVv	8S�>E8�����F]�0��&Eq� �@L7�bq�\������1�������y&�d����t�!|�3K61��@j�bz��`=U����	# |a*
2}P7(�y�l���� �U��8�B���F4Θ�% Z�ŗ(p�{cHĽ�̵ёp2�j���L�>�X>�s���GZV�UeI%���3}Am�� i�r;@>y�+��(�� ?T���"=��d���K�J%A�<:~ẏ���y��M(��z���+%.�I�z��E��yB$�=��s��oi8��B��~��FJV���� �Q_IX��8�E�%,�ڙ��o��W�k�-��u��	�יx6ց��bQ��dCOr��[��#=@Cg���������7ƭH�$��]`���7p���qKx����Cm�*����h[�P�������v����-:��B�8�_|~9�`.�p�f�����ػ���s�M��Ό3u�;���{�e�GN�7:��B�/)���ݛ)�چ�޲0���i�Ӑֻ�-C���~t��M��l_q_�oImW���2��tN��Y�2%A��w���u�f���vb�ܓҮ�^�	����'��%�1-�t��AC�HZ?x�y����;ff���h�:���T�w�R����+{�S+x8(@s�p3���Ǯ!�JC�DЌ�rY���z%��d.�[�URd�6��'��R���a��%-~eN��Y]㎗&��#���u�o�2�g%�'DD��o�A%���Ǒb؆����8[d"�,2 ~�oD��@�vu�N�Zz��ᦑ�d=Տ�S�|7�8mL�"fr
���I_�-�Б����00��A���kd©��e�x��#3��+CT��mS��^����Q�*�z�D���K�5�\�.;0M���Gߍ�'�Bif"3<2[�$|�����uǌ��BUҔ��LZx�^`�M�M��f�[���޳�jNb�Mg�t�0RtWo̥>�:�q�H�|=����ٻ=��o���(Wi��Ɓ���j����,������<�:R�/0����!������e�1 U��2M9C��v�'?��i]�e9cB�A������B�>��4_ j��=��Lf�΋;,&r�yh�9��4�'���h��)M��γ��g|y����������ӿiL�����G�ǳfp�ѓQe����ۢ��ٯ��c����)�{�τ�<e�/���w1�� �L�{'_S���b숵��8=7�����;ƣ=|��+��H����Y�������6a���ɓ'����            x���A
�0@����@d&3I�ٺ�)MĂQ0x��Bpa���Z+ǩ��
�����*���R����:KQ)(��&T�+��a�s��KK^9�i���������wƘ'��K�         �   x����
�0Eד��Z2�45k��D������;1Rk5+a6�8�&LB,d��G��$Uם�����=��������V1`�G�B�˥���}���$�w�ס�)st�ց]n���(1���]�a�a��7��~������=$�t+#�6��G�*����y}%j��4�< k�{�         9   x�3�T�)�.PK/�.I-B ��" L!��"(�T��3ƏӇ�D��q��qqq �x�         �  x��T�n�0�����bA��:�	
8-�.�!�@K'��D
$e���)P4K׌��w���<��hX[��G4X�D�����t�*N��ҩ�-��a�*)�[b�Bg���uU�ga�N���Ɍ��s�S�-�Ղg��"ˋ|E��K�/����<�H*��ha�He���4}Ҧě�j%�,H_�}�
�wlJ��h���i�%�b%~y��Y@%Jסr�rj>
��y[��}�Vje�G�S��$��:$c�	�k$���%�o�A��%�~�s	bp�6�I�M-gl�|ZyPa��~g׊H����kY����[k�u���1I�s� ��{���8�?<wty#ڿ�ds'��2̶	�ϲ�k���o`����J���{�*���.<�;ǍܤwŖ�BE�z������9%_�F�Z�������3�[
ch�0t�~B�e���y2M �E����'�>b��vw�1{�{@/�����sΔ�ˬX���d����<���d�.���7���         �  x��V]O�0}n~�_�'�ٴ��!m���E�G�ʉo���3ۥ˿��&4M��iBLr���\��s|c��`��lÐ�%�/��g�*�;����PNe�`�>���n���5-�|�A*kw�&�r�s���JS��T�>�7̟�Mn�}ă������M��8��4I���yX\�`��,l��Gus��[��k;yq�x�8c�(�x��5��&�t�2��QΰRh���cI h-^@V�LH���J\ ROj�J���)ٖ�>C�I0J��J*�%�>�K����@���D[_�L��9�M�/�F�xw�\(!5�7��~�Uޟ@|����	��('�B�*�*0��qe�b{��8���8����H+�	81a7�΀U���F�!�k����U�<m��g�,�MW/��-h���⪟�4	�i4�X��<�S͠����J��?�0:�I<�x���RCtM��_�q	�:l�͒��	R6��9AH��I_�֥��.L[澶�7
a��x19����δn]��s��Pm��<�}J�'��gt������e��v�A��^b�V�;_�[lD1}�u+EJ���^�7�h/�N�E�Oe��IQ��ʁ�-]��G
;��Ōg�����r�UJ#0�^�^��Ul��؝G��y$uG���$hi6lې.�kο8r�y��y� �tD�            x������ � �            x������ � �      !   �   x�u�Q
�0D�7��&;M4g(�� b������+U�P
˲�f�|���X��H��ڏ�<w���G�ч��s�>�Z_:Qi�9�è�h��.Ò�Ɣb0��^w]�U�������b�>-:�q���B�[|[�RR�VJ���<1      #   T   x�3�461AcNΌ���b+}��������2��<}N##c]s]CK#c+CC+S �Ӆ�Q%M��L@����\1z\\\ <��      %   \   x�3�L�HM���,.1�4202�50�5�T02�22�22r9}89�F
V�VF IC.#Nc##c4��FV&�0�1~�d��b���� �EP      '   6   x�3�412� N##c]s]CK##+c#+# �ӇӐ3��,PƐ+F��� )�      )   ]   x�3�461#N#CK]##3M ml`fhlhlldj�W����	�50�54V04�2��20r9}89c�p��l Y��Z�E%\1z\\\ �G
      +   S   x�3�461BcN##c3C#C3#sS��Ģ����]C���tN����������� ��>���1~�d8�p��qqq h�h      -   �  x����n�0���U|����@�.͚��AI�T�/X�ldB�����iS�
iqd�~����GP��s.��1��ץ��._�r�0/r!x���.�/�V~4���T)�I�뽂J:mܩ�t�A�~m��v����ܞ�~��6�f��ֺ`m��m$Q�1j�"_44r/���;e���1�	�.�ᰙm�[��4�	�'7�K���c:�SD1�C<	�H�1���O�#"���3:�p2�����]��|�/����)��;B���u=p�d �t?����6��ם��1M��N������g�Kk��Ø�4Nh:��h0����i�%��z��
�S����/y+xu�m�������C�����������vP[���O�$_w�({#a�2���O�,���/.��?�So ����f(6I>��,��+>ddcԜݛz�.�ڇ�����4ft��F��//��l      /      x������ � �      1   �   x���M
�0FדS�M�'Mpv�K��)�Rm1��k\(R]����8v,Y���P�L�؍%���Ó�J���֤�O�A��E	��1�S�&����_R}��I��Aѩ�ȯ�������S;���nv8W�ݼʖͷD�2�Xc�ZD�      3   x   x�ǹ1 ��.�k������>^���?��f��η����C3���� ��[�L�}��,�:J&� D3K]���g�'+ ؒDx�a�\$^H�f!�L�q\�ñ]���ף���)      5   �   x�}�Q� D��Sx�Ҳ@i9���AmZT��?<�K5��h2لy�3 �T(i@��6 (#�(%�y�|:XHV�L���B�+:��L�ĥ-*+1aA��P��wwGv����OS}��l�܅����c�ݍ�����[��� �D������|��^�V���f�S�`g�= o�J�      7   b  x����n�@���`�,@�2`�e����T�x츍�E����;��`0rl��a~<��9s��t*��R�;$��T�_��voW�-+���)�}�x�Ġ�PI�����UPi!�1@�"���`ċ@wEv'V".�X۬<VtA�Mւ�B_a���T�O5<�߆�OP/�X��Sق�K����p#��p��i�J�����kH��+�#H=�Wm�����ܖp	)�k`'b�=X���_1���?s�	��%y�np3x�ʚ�w�Nj�h�-�cy6��Mx���W�������`�Qt!*=Iv����~8���5ա�B��R�3q2q
��!!���k�u������tq�t��j'�v���y��Tx�c�p؊��E�Y �$t��I?G��z8��ad&�n�T4O�D
�S�TA�K�	*;�>��+J��~��>�su�AD�6�d(�ެ2�`�:��Io�R�?��b�[����>��rK޿�ךA�*LR�䘇ۏc��5t�_:�΁�4p@�Z�4�H�y�l�$"����2�C�f"�+1��UQJ�!*�@���惰��݉�u��=!��8�E�3�F�Q�k�X,�xn      9   |   x�e�;�@Dk���"�?Y�3 N@�D

����%B( [n��x@a�^su�vIE��X��H%l�'jb���2X��O�6YdL���S$	l�̏e�͗�����'$��`� �v����'I      ;   k  x���Ko�8���ફiˇ�;WM�<�L�4� ��ȱP[�������HNI���:��D��K{�k�m�������{F�_!����)�i�����E��a"{#I���(;Vݱ�^H�%�r���PW���F���g"�}���	������!ս�������R�쨴�Ak3NXp<Hh��MQ�=M�_1HX>tc9�]�g��^I�~�f�g�r�*G�n��~�������ַ����Vi8F���v�uSɶۺ4{����6�f``�:V��0�(;����C�iV9�f@h�3 ����\WO��No�;�V�P�$�XO��)6S֑��n��0��ݱ�	�˦��&���؆���3�U�-:X:r�8�mt�wzrA�ݰ�Y�F+3(�aWu$�%-C3Y�:�ݖJ�,D��&�x}����+C��7ݸ7�c���� F�,Biݕ㾘r7������)Q�aNї�;h뭼Ҷ���V~�x�m�4�JwU�}I5�-�{9\�= >������o.I�6�\p���lJsCA�>N�{�҄�D�Y�ޒr*b�)ʗ�?��m�����乐/I�D��� ��g�w$?O�9�O}��_�cn,�0�([�O(�)^"��	g$�xѴ�+�*T7��eG��ZN/x?��e4,��Sv{CnsN����=i��_\�L/���[A����>�/E�<�=��g*�ו�����:[}V��;�b��M��@��K��Ť$HD䌐1�(ͮn`�r'T����ӄC�K
�P��K��s�	���P��릚���,�{�l�� ƄQ�'��d�@�A!����B������7�:�Ѕ~�r	�	R�?b4U�T����j�NVK�?�=�w�c�?�Ȍ      =   T   x�u��	�0�wU�@dw/1p5���:4(�G��00��&&(
zQ])�x���b�� ��u��e���w�-�~Oh�����	���      ?   ;   x�3�,**/O-21262��4202�50�54T04�25�20r9�H��$\8�b���� 2|�      A   N   x�3�4612126���4202�50�54T04�22�24r9}89c�pIrQj�1^�� ��2�g�� �\1z\\\ +�.g      C      x������ � �      E   �   x���M�1����S�-��*�f70K���6���0�������F�Mx!OR���2X��~��v�DC�0I�r�����������Xĺ#����]$���S{<}�Ţ,L��/�I�Q1�$U3�R��/��p�ofzu2s'��~z�8�!��J�����=U�NQ��ϛ���ޫM�ݖ5xג-���6���s�e>      G   m  x���Mn�0���S�ό͏w���z�lR���!�	��k�����R��'��yhh�S#w����9��jնm\U�չzٔq�_)�H%�Dcun1�T
O ���D ���O�����;M<���á)j�	F�������2��&Kbk2���F[@7�n��\_��E��TnQj��yBq��D��ɤ�xXT�ro�^�g�����p��ѱ�.�Y�%&��e�9M(�Qܣ-�~~��qfy,��dR˦�����{�4R��n�p'N���M�슥s�]����-Űc�u��TRmu:�$��ӡ�f�	��r���ΆbW$�!�B6΀�!oKJ����sdֱ����      I   a   x�m�;
�0D��Sx�Hf����=�e��"�7mD�<!/�	�~�Xq�&,�j7�%� 	�d����\k�r��zi���)i�&Dq���ϕ�oy�4      K      x������ � �      M   V  x�u��j�0ƯO�"/�$''��jũ�t��s0�Ff6�. {�������i��ǗIX4����r����.���({<�	d"�Rh^-����b��t������n����ٝ��:�`�~��UՁa�qp�4�J�F�$���M�D�Dt���[j� ��hK���߫�bOu]��:��F��L����_׾=��jr�G)��W �!jj�GB�����S2[>Ɔ˺��&�Fi��b2IGc@����g[b�k��ׂI&�z;�8�]� j��E���I�$����y�,��$6�1��ƹ��,C�>� �.�?��=���W�����M��      O   �   x����
�0���S�M�2�-Ԃe�����?�tC�6�\��|	�)�s�]�����lB�CI!��7���sɜ)ҕ:Wh�R�a=��(ƼE5���9s����Ҽ߭�j���˽D�����sZ;�������D�h�%�G��t0���:�-Gg�	� <�hd      Q   �   x�u���@�继���k+ڍ�I97FXt������gdl�?_��xFs����oʦ�4K�`��0�Q��Y�/�ml��0eB����I�oF�� ��_tR�"FF�(�	�μ�����f�wyi��]U�9I&M%t����i �תvm�7�:8S�m�8S�S���5�����c��4`Qp��DLaݭ��Oڢ_"     