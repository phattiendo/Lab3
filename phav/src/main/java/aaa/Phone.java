package aaa;

@Entity
@Table(name = "MobilePhone")
public class Phone {
    
    @Id
    @Column(name = "ID")
    public String id;
    
    @Column(name = "Name", nullable = false)
    @Size(min = 3, max = 128)
    public String name;
    
    @Column(name = "Price", nullable = false)
    public int price;
    
    @Column(name = "Color")
    @Size(min = 3, max = 128)
    public String color;
    
    @Column(name = "Country")
    @Size(min = 3, max = 128)
    public String country;
    
    @Column(name = "Quantity")
    public int quantity;
    
    @ManyToOne(fetch = FetchType.LAZY)
    @JoinColumn(name = "manufacturer_id", nullable = false)
    public Manufacturer manufacturer;
    
    // Constructors, getters, and setters
}
