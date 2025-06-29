// const mysql = require('mysql2/promise');
import mysql, {Pool} from 'mysql2/promise';

declare global{
    var db : Pool | undefined;
}

//create connection
const db =   global.db ||
    mysql.createPool({ // create pool handles multiple connections instead of createConnection that handles single connection
    host: process.env.DB_HOST || 'localhost',
    user: 'root',
    password:'',
    database:'nextjs',
    waitForConnections: true,
    connectionLimit: 10,      // 🟢 limits to 10 connections
    queueLimit: 0 
});

//export connection
export default db;