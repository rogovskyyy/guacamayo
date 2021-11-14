use serde::{Serialize, Deserialize};
use jsonwebtoken::{encode, decode, Header, Algorithm, Validation, EncodingKey, DecodingKey};


#[derive(Debug, Serialize, Deserialize)]
struct Token {
    sub: String,
    company: String,
    exp: usize,
}

impl Token {

    pub fn create() { }
    
    pub fn read() { }

}