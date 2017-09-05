\encoding UTF8

DROP TABLE IF EXISTS users;
CREATE TABLE IF NOT EXISTS users (
  id            BIGSERIAL NOT NULL,
  username      TEXT,
  email         TEXT,
  password      TEXT,
  created_at    TIMESTAMP(0),
  updated_at    TIMESTAMP(0),
  PRIMARY KEY (id)
);
ALTER TABLE users
  OWNER TO "zf3test";

CREATE INDEX users
  ON users (username);

COMMENT ON TABLE users IS 'ユーザ';
COMMENT ON COLUMN users.id IS 'シーケンシャルID';
COMMENT ON COLUMN users.username IS 'ユーザ名';
COMMENT ON COLUMN users.email IS 'メールアドレス';
COMMENT ON COLUMN users.password IS 'パスワード';
