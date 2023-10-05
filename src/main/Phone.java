package com.phatvt;

import jakarta.persistence.*;

@Entity
@Table(name="mobilephone")
public class Phone {
    @Id
    private String id;
    private String name;
    private int price;
    private String color;
    private String country;
    private int quantity;

    @ManyToOne
    @JoinColumn(name="idmanufacture")
    private Manufacture manufacturer;

    public Manufacture getManufacturer() {
        return manufacturer;
    }

    public void setManufacturer(Manufacture manufacturer) {
        this.manufacturer = manufacturer;
    }

    public Phone() {}

    public Phone(String id, String name, int price, String color, String country, int quantity, Manufacture manufacture) {
        this.id = id;
        this.name = name;
        this.price = price;
        this.color = color;
        this.country = country;
        this.quantity = quantity;
        this.manufacturer = manufacture;
    }


    public String getId() {
        return id;
    }
    public void setId(String id) {
        this.id = id;
    }
    public String getName() {
        return name;
    }
    public void setName(String name) {
        this.name = name;
    }
    public int getPrice() {
        return price;
    }
    public void setPrice(int price) {
        this.price = price;
    }
    public String getColor() {
        return color;
    }
    public void setColor(String color) {
        this.color = color;
    }
    public String getCountry() {
        return country;
    }
    public void setCountry(String country) {
        this.country = country;
    }
    public int getQuantity() {
        return quantity;
    }
    public void setQuantity(int quantity) {
        this.quantity = quantity;
    }

    @Override
    public String toString() {
        return "Phone [id=" + id + ", name=" + name + ", price=" + price + ", color=" + color + ", country=" + country
                + ", quantity=" + quantity + "]";
    }

    

}
