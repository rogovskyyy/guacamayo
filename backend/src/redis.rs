#![allow(dead_code)]

extern crate redis;
use redis::{
    Commands,
    ToRedisArgs
};

pub struct Redis { }

// 1. Remove connection to outer implementation

impl Redis {

    // Creating new session

    pub fn store<V: ToRedisArgs>(key: &str, value: V) -> redis::RedisResult<()> { 
        let client = redis::Client::open("redis://127.0.0.1/")?;
        let mut con = client.get_connection()?;
        return con.set(key, value);
    }

    // Reading selected session

    pub fn read(key: &str) -> redis::RedisResult<()>{
        let client = redis::Client::open("redis://127.0.0.1/")?;
        let mut con = client.get_connection()?;
        return con.get(key);
    }

    // Deleting selected session

    pub fn delete(key: &str) -> redis::RedisResult<()>{ 
        let client = redis::Client::open("redis://127.0.0.1/")?;
        let mut con = client.get_connection()?;
        return con.del(key);
    }

}