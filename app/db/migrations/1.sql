CREATE TABLE todo_list
(
  id   bigserial NOT NULL,
  task varchar,

  PRIMARY KEY (id)
);

CREATE TABLE "user"
(
  id         bigserial NOT NULL,
  nick_name  varchar   NOT NULL,
  email      varchar   NOT NULL,
  password   varchar   NOT NULL,

  PRIMARY KEY (id)
);

CREATE UNIQUE INDEX ON "user" (lower(nick_name));
CREATE UNIQUE INDEX ON "user" (lower(email));
