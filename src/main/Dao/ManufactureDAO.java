package com.phatvt;

import java.util.List;

import javax.management.openmbean.InvalidOpenTypeException;

import org.hibernate.Session;
import org.hibernate.Transaction;

import jakarta.persistence.Query;


public class ManufactureDAO implements CrudDAO<Manufacture> {

    @Override
    public boolean add(Manufacture t) {
        Session session = HibernateUtils.getSessionFactory().openSession();
        int rowCount = 0;
        Transaction transaction = null;
        try {
            
            transaction = session.beginTransaction();
            
            String hql = "INSERT INTO Manufacture (id, name, location, employee) VALUES (:id, :name, :location, :employee)";
            Query query = session.createQuery(hql);
            query.setParameter("id", t.getId());
            query.setParameter("name", t.getName());
            query.setParameter("location", t.getLocation());
            query.setParameter("employee", t.getEmployee());

            rowCount = query.executeUpdate();

            transaction.commit();

            
        } catch (Exception e) {
            if (transaction != null) {
                transaction.rollback();
            }
            e.printStackTrace();
        } finally {
            session.close();
            return rowCount == 1;
        }


    }

    @Override
    public Manufacture get(String id) {
        Session session = HibernateUtils.getSessionFactory().openSession();
        Manufacture manufacture = null;
        Transaction transaction = null;
        try {
            transaction = session.beginTransaction();
            String hql = "FROM Manufacture WHERE id = :manufactureId";
            Query query = session.createQuery(hql);
            query.setParameter("manufactureId", id);
            manufacture = (Manufacture) query.getSingleResult();
            transaction.commit();
        } catch (Exception e) {
            if (transaction != null) {
                transaction.rollback();
            }
        } finally {
            session.close();
        }

        return manufacture;
    }

    @Override
    public List<Manufacture> getAll() {
        Session session = HibernateUtils.getSessionFactory().openSession();
        Transaction transaction = null;
        List<Manufacture> resultList = null;
        try {
            transaction = session.beginTransaction();
            String hql = "FROM Manufacture";
            Query query = session.createQuery(hql);
            resultList = query.getResultList();
            transaction.commit();
        } catch (Exception e) {
            if(transaction != null)
                transaction.rollback();
        } finally {
            session.close();
            return resultList;
        }

        
    }

    @Override
    public boolean remove(String id) {
        Session session = HibernateUtils.getSessionFactory().openSession();
        Transaction transaction = session.beginTransaction();
        String hql = "DELETE FROM Manufacture WHERE id = :id";
        Query query = session.createQuery(hql);
        query.setParameter("id", id);
        int rowCount = query.executeUpdate();
        transaction.commit();
        session.close();

        return rowCount == 1;

    }

    @Override
    public boolean remove(Manufacture t) {
        if(t == null) return false;
        Session session = HibernateUtils.getSessionFactory().openSession();
        session.beginTransaction();
        session.delete(t);
        session.getTransaction().commit();
        session.close();
        return true;
    }

    @Override
    public boolean update(Manufacture t) {
        if(t == null) return false;
        Session session = HibernateUtils.getSessionFactory().openSession();
        session.beginTransaction();
        session.update(t);
        session.getTransaction().commit();
        session.close();
        return true;
    }

    // A method to check whether all manufacturers have more than 100 employees
    public boolean isAllManufacturesHaveMoreThanOneHundredEmployees() {
        List<Manufacture> lst = getAll();
        return lst.stream().allMatch(manu -> manu.getEmployee() > 100);
    }

    // A method that returns the sum of all employees of the manufactures
    public int sumOfAllEmployees() {
        List<Manufacture> lst = getAll();
        return lst.stream().mapToInt(Manufacture::getEmployee).sum();
    }
    
    // A method that returns the last manufacturer in the list of manufacturers that meet 
    // the criteria: based in the US. If there is no producer that meets the above criteria, 
    // throw an InvalidOperationException

    public Manufacture findLast() {
        List<Manufacture> lst = getAll();
        return lst.stream()
                .filter(m -> m.getLocation().equals("US"))
                .reduce((first, second) -> second)
                .orElseThrow(InvalidOpenTypeException::new);
        
    }
}
