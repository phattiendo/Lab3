package com.phatvt;

/**
 * Hello world!
 *
 */
public class App 
{
    public static void main( String[] args )
    {
        // Manufacture manufacturer = new Manufacture("M01", "Samsung", "Saigon", 12);
        ManufactureDAO manufactureDAO = new ManufactureDAO();
        PhoneDAO phoneDAO = new PhoneDAO();
        // manufactureDAO.add(manufacturer);
        Manufacture manu = manufactureDAO.get("M01");
        
        manu.getLstPhone().forEach(System.out::println);
    }
}
