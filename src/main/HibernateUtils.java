package com.phatvt;

import java.util.Properties;

import org.hibernate.SessionFactory;
import org.hibernate.cfg.Configuration;
import org.hibernate.cfg.Environment;

public class HibernateUtils {
    private static SessionFactory sessionFactory;

    public static SessionFactory getSessionFactory() {
        if(sessionFactory == null) {
            Configuration conf = new Configuration();
            Properties props = new Properties();
            props.put(Environment.DIALECT, "org.hibernate.dialect.MySQLDialect");            
            props.put(Environment.DRIVER, "com.mysql.jdbc.Driver");
            props.put(Environment.URL, "jdbc:mysql://localhost:3306/phonemanagement");
            props.put(Environment.USER, "root");
            props.put(Environment.PASS, "123456");


            conf.addAnnotatedClass(Phone.class);
            conf.addAnnotatedClass(Manufacture.class);
            conf.setProperties(props);

            sessionFactory = conf.buildSessionFactory();
        }

        return sessionFactory;
    }
}
