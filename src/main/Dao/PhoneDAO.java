package com.phatvt;

import java.util.Comparator;

import java.util.List;
import java.util.Optional;

import org.hibernate.Session;
import org.hibernate.Transaction;

import jakarta.persistence.Query;


public class PhoneDAO implements CrudDAO<Phone> {

    @Override
    public boolean add(Phone t) {
        Session session = HibernateUtils.getSessionFactory().openSession();
        session.beginTransaction();
        session.save(t);
        session.getTransaction().commit();
        session.close();

        return true;
    }

    @Override
    public Phone get(String id) {
        Session session = HibernateUtils.getSessionFactory().openSession();
        Phone p = session.get(Phone.class, id);
        session.close();
        return p;
    }

    @Override
    public List<Phone> getAll() {
        Session session = HibernateUtils.getSessionFactory().openSession();
        Transaction transaction = session.beginTransaction();
       
        String hql = "FROM MobilePhone"; 
        Query query = session.createQuery(hql);
        List<Phone> resultList = query.getResultList();

        transaction.commit();
        session.close();

        return resultList;
    
       
    }

    @Override
    public boolean remove(String id) {
        Session session = HibernateUtils.getSessionFactory().openSession();
        Phone phone = session.get(Phone.class, id);

        if(phone == null) {
            return false;
        }

        session.beginTransaction();
        session.delete(phone);
        session.getTransaction().commit();
        session.close();
        return true;
    }

    @Override
    public boolean remove(Phone t) {
        if(t == null)
            return false;
        Session session = HibernateUtils.getSessionFactory().openSession();
        session.beginTransaction();
        session.delete(t);
        session.getTransaction().commit();
        session.close();
        return true;
    }

    @Override
    public boolean update(Phone t) {
        if(t == null)
            return false;
        Session session = HibernateUtils.getSessionFactory().openSession();
        session.beginTransaction();
        session.update(t);
        session.getTransaction().commit();
        session.close();

        return true;
    }

    // A method that returns the phone with the highest selling price

    public Phone getHighestSellingPrice() {
        List<Phone> lst = getAll();
        Optional<Phone> optionalPhone = lst.stream()
            .max(Comparator.comparingInt(Phone::getPrice));
        if (optionalPhone.isPresent()) {
            return optionalPhone.get();
            
        } 
        return null;
    }

    // A method to get a list of phones sorted by country name, if two phones have the 
    // same country, sort descending by price

    public List<Phone> listAfterSorted() {
        List<Phone> lst = getAll();
        lst.sort(Comparator.comparing(Phone::getCountry)
            .thenComparing(Comparator.comparing(Phone::getPrice).reversed()));
        return lst;
    }

    // A method to check if there is a phone priced above 50 million VND

    public boolean checkPricedAbove(Phone phone, int price) {
        return phone.getPrice() > price;
    }
   
    // A method to get the first phone in the list that meets the criteria: has the color 'Pink' 
    // and costs over 15 million. If there are no matching phones, return null

    public Phone getFirstPinkAndCostOverFiftyMillionPhone() {
        List<Phone> lst = getAll();
        Phone phone = lst.stream()
                        .filter(p -> p.getColor().equals("Pink") && p.getPrice() > 15000000)
                        .findFirst()
                        .orElse(null);
        return phone;
    }

}
