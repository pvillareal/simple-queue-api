create table task
(
    id           int auto_increment
        primary key,
    message      varchar(250)  null,
    status       int default 1 null comment '1 = ready
2 = processing
3 = completed',
    priority     int default 1 null,
    submitter_id varchar(20)   null,
    processor_id varchar(20)   null
);


