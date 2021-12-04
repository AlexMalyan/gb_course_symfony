# COURSE 2 SYMFONY framework

---

### Урок 1. ООП в PHP. Базовые понятия
1. Придумать класс, который описывает любую сущность из предметной области интернет-магазинов: продукт, ценник, посылка и т.п.

2. Описать свойства класса из п.1 (состояние).
   
3. Описать поведение класса из п.1 (методы).      

4. Придумать наследников класса из п.1. Чем они будут отличаться?


   **Решение:**  [В файле Product.php](Product.php "Необязательная подсказка")

5. Дан код:

   `class A {
   public function foo() {
   static $x = 0;
   echo ++$x;
   }
   }
   $a1 = new A();
   $a2 = new A();
   $a1->foo();
   $a2->foo();
   $a1->foo();
   $a2->foo();`
   Что он выведет на каждом шаге? Почему?

    **РЕШЕНИЕ :**

   foo() - имеет локальную переменную которая не сгорает при последующих вызовах.

   Ключевое слово static, написанное перед присваиванием значения локальной переменной, приводит к следующим эффектам:

   * Присваивание выполняется только один раз, при первом вызове функции
   * Значение помеченной таким образом переменной сохраняется после окончания работы функции
   * При последующих вызовах функции вместо присваивания переменная получает сохраненное ранее значение


   Немного изменим п.5:

   `class A {
   public function foo() {
   static $x = 0;
   echo ++$x;
   }
   }
   class B extends A {
   }
   $a1 = new A();
   $b1 = new B();
   $a1->foo();
   $b1->foo();
   $a1->foo();
   $b1->foo();`
6. Объясните результаты в этом случае.

   **РЕШЕНИЕ:**
    _При наследовании класса **A** foo() будет вести себя как новое значение_
   1. *Дан код:

         `class A {
         public function foo() {
         static $x = 0;
         echo ++$x;
         }
         }
         class B extends A {
         }
         $a1 = new A;
         $b1 = new B;`
   
      Что он выведет на каждом шаге? Почему?
   
      `$a1->foo();//выведет 1 выводится впервые
      $b1->foo();//выведет 1 переменная static не уничтожается после использования
      $a1->foo();//выведет 2 выводится впервые
      $b1->foo();//выведет 2 переменная static не уничтожается после использования
      ` 
   
         