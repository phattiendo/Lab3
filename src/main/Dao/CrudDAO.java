package com.phatvt;

import java.util.List;

public interface CrudDAO<T> {
    public boolean add(T t);
    public T get(String id);
    public List<T> getAll();
    public boolean remove(String id);
    public boolean remove(T t);
    public boolean update(T t);
}
