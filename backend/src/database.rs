use mysql::*;
use mysql::prelude::*;
use redis::Value::Data;

pub struct Connection { }
pub struct Database {
    db: PooledConn
}

impl Connection {
    pub fn new() -> Result<PooledConn> {
        let url = "mysql://root:123@127.0.0.1:3306/guacamayo_db";
        let opts = Opts::from_url(url)?;
        let mut pool = Pool::new(opts)?;
        pool.get_conn()
    }
}

impl Database {
    pub fn new() -> Result<Database> {
        match Connection::new() {
            Ok(v) => {
                Ok(Database {
                    db: v
                })
            },
            Err(_) => panic!("Kernel error occured. Can't connect to database.")
        }
    }
}