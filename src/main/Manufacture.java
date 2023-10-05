package com.phatvt;
import java.util.List;

import jakarta.persistence.*;

@Entity
public class Manufacture {
    @Id
    private String id;
    private String name;
    private String location;
    private int employee;

    @OneToMany(mappedBy="manufacturer", fetch = FetchType.EAGER)
    List<Phone> lstPhone;


    
    public List<Phone> getLstPhone() {
        return lstPhone;
    }

    public void setLstPhone(List<Phone> lstPhone) {
        this.lstPhone = lstPhone;
    }

    public Manufacture(String id, String name, String location, int employee) {
        this.id = id;
        this.name = name;
        this.location = location;
        this.employee = employee;
    }

    public Manufacture() {}

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
    public String getLocation() {
        return location;
    }
    public void setLocation(String location) {
        this.location = location;
    }
    public int getEmployee() {
        return employee;
    }
    public void setEmployee(int employee) {
        this.employee = employee;
    }

    @Override
    public String toString() {
        return "Manufacture [id=" + id + ", name=" + name + ", location=" + location + ", employee=" + employee + "]";
    }


    
    
}
