import { getImageUrl } from './utils.js';

export default function Gallery() {
  const p1 = {
    imageId : 'YfeOqp2',
    name: 'Maria Skłodowska-Curie',
    profession : 'physicist and chemist',
    awards : ['Nobel Prize in Physics', 'Nobel Prize in Chemistry','Davy Medal', 'Matteucci Medal'],
    discovered : 'polonium (chemical element)'
  }
  return (
    <div>
      <Profile person={p1} size={100}/>
    </div>
  );
}

function Profile({person,size}){
  return (
    <>
      <section className="profile">
        <h2>{person.name}</h2>
        <img
          className="avatar"
          src={getImageUrl(person.imageId)}
          alt={person.name}
          width={size}
          height={size}
        />
        <ul>
          <li>
            <b>Profession: </b> 
            {person.profession}
          </li>
          <li>
            <b>Awards: {person.awards.length} </b> 
            {person.awards.map((a,i)=>{
              return <span key={i}>{a} <b>/</b> </span>
            })}
          </li>
          <li>
            <b>Discovered: </b>
            {person.discovered}
          </li>
        </ul>
      </section>
    </>
  );
}
