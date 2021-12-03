#[derive(Debug, PartialEq, Eq)]
struct User {
    u_id: i32,
    u_email: Option<String>,
    u_password: Option<String>,
}